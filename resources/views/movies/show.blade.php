@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $movie->title }}</h1>

    <div class="flex space-x-4">
        <img src="{{ Storage::url($movie->poster) }}" alt="Poster" class="w-48 h-72 object-cover rounded-lg border">

        <div>
            <p class="text-gray-700"><span class="font-semibold">ID:</span> {{ $movie->id }}</p>
            <p class="text-gray-700"><span class="font-semibold">Thể loại:</span> {{ $movie->genre->name ?? 'Không xác định' }}</p>
            <p class="text-gray-700"><span class="font-semibold">Ngày chiếu:</span> {{ $movie->release_date }}</p>
            <p class="mt-2 text-gray-700"><span class="font-semibold">Giới thiệu:</span> {{ $movie->intro }}</p>
        </div>
    </div>

    <a href="{{ route('movies.index') }}" class="inline-block mt-4 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">
        ⬅ Quay lại
    </a>
</div>
@endsection
