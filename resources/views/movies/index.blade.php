@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Danh sách Phim</h1>

    <a href="{{ route('movies.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        + Thêm phim
    </a>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg">
        <p>{{ session('success') }}</p>
    </div>
    @endif


    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Tiêu đề</th>
                    <th class="border p-2">Áp phích</th>
                    <th class="border p-2">Giới thiệu</th>
                    <th class="border p-2">Ngày chiếu</th>
                    <th class="border p-2">Thể loại</th>
                    <th class="border p-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr class="border">
                    <td class="border p-2">{{ $movie->id }}</td>
                    <td class="border p-2">{{ $movie->title }}</td>
                    <td class="border p-2">
                        <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" class="w-16 h-24 object-cover">

                    </td>
                    <td class="border p-2">{{ Str::limit($movie->intro, 50) }}</td>
                    <td class="border p-2">{{ $movie->release_date }}</td>
                    <td class="border p-2">{{ $movie->genre->name }}</td>
                    <td class="border p-2">
                        <div class="flex space-x-2">
                            <a href="{{ route('movies.show', $movie->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg text-center shadow-md hover:bg-blue-600 transition duration-300">
                                Chi <br> tiết
                            </a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg text-center shadow-md hover:bg-yellow-600 transition duration-300">
                                Sửa
                            </a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-center shadow-md hover:bg-red-600 transition duration-300">
                                    Xóa
                                </button>
                            </form>
                        </div>

                        <script>
                            function confirmDelete() {
                                return confirm("Bạn có chắc chắn muốn xóa phim này không?");
                            }
                        </script>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
