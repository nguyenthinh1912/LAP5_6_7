@extends('admin.layout_admin')
@section('content')
    <div class="content_admin">
        @if (Session::has('success'))
            <strong style="color: green">{{ Session::get('success') }}</strong> <br>
        @endif
        <table class="table ">
            <thead>
            <tr>
                <th>FullName</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Active</th>
                <th>Role</th>
                <th>Avatar</th>

            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td> <form action="{{ route('active', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $user->active ? 'btn-success' : 'btn-danger' }}">
                                {{ $user->active ? 'Đang hoạt động' : 'Đã khóa' }}
                            </button>
                        </form></td>
                    <td>{{ $user->role == 0 ? "Khách Hàng":"Admin"}}</td>
                    <td>
                        <img src="{{ $user->avatar ? Storage::url($user->avatar) : "" }}"
                             style="height: 100px; width: 100px; border-radius: 50%" alt="" srcset="">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".toggle-active").click(function () {
                let button = $(this);
                let userId = button.data("id");

                $.ajax({
                    url: `/user/${userId}/toggle-active`,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            button.text(response.active ? "Đang hoạt động" : "Đã khóa");
                        } else {
                            alert("Có lỗi xảy ra!");
                        }
                    },
                    error: function () {
                        alert("Không thể cập nhật trạng thái!");
                    }
                });
            });
        });
    </script>

@endsection
