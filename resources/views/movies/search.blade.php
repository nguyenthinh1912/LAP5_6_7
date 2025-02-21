@extends('layouts.app')
@section('content')
    <form method="GET" action="{{ route('movies.search') }}">
        <input type="text" name="query" placeholder="Tìm kiếm phim...">
        <button type="submit">Tìm</button>
    </form>
    @foreach($movies as $movie)
        <h3>{{ $movie->title }}</h3>
    @endforeach
@endsection
