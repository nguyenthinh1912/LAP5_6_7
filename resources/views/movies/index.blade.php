@extends('homes.layouts')
@section('title','Movie List')
@section('content')
    <div>
        <h1>Movie List</h1>
    </div>
{{--    <form class="form-group" method="GET" action="{{ route('book') }}">--}}
{{--        <select class="form-control" name="category_id">--}}
{{--            <option value="">Chọn thể loại</option>--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

{{--        <button class="btn btn-primary" type="submit">Lọc</button>--}}
{{--    </form>--}}

    <div>
        @if (Session::has('message'))
            <strong style="color: green">{{ Session::get('message') }}</strong> <br>
        @endif
        <a href="{{ route('add_movie') }}" class="btn btn-outline-primary">Add</a>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>poster</th>
                <th>release_date</th>
                <th>genre</th>
                <th>action</th>
            </tr>
            </thead>
            @foreach($movies as $movie)
                <tbody>
                <tr>
                    <th scope="row">{{$movie->id}}</th>
                    <td>{{$movie->title}}</td>
                    <td><img src="{{ asset('storage/' . $movie->poster) }}" width="90"></td>
                    <td>{{$movie->release_date}}</td>
                    <td>{{$movie->gene}}</td>
{{--                    <th><a class="btn btn-primary" href="{{route('detail',['id'=>$movie->id])}}">Detail</a></th>--}}
                    <td>
                        <a class="btn btn-outline-warning" href="{{ route('edit_movie',['id'=>$movie->id]) }}">Edit</a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Do you want to delete this movie?')" href="{{ route('delete_movie',['id'=>$movie->id]) }}">Delete</a>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
        {{$movies->links()}}
    </div>

@endsection
