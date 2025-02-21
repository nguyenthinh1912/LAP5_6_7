@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa phim</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Tiêu đề:</label>
            <input type="text" name="title" value="{{ $movie->title }}"
                   class="w-full p-2 border rounded-lg">
        </div>

        <div>
            <label class="block font-semibold">Áp phích (URL):</label>
            @if($movie->poster)
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" class="w-32 h-48 mt-2">
            @endif

            <input type="file" name="poster" class="w-full p-2 border rounded-lg">
        </div>

        <div>
            <label class="block font-semibold">Giới thiệu:</label>
            <textarea name="intro" class="w-full p-2 border rounded-lg">{{ $movie->intro }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Ngày chiếu:</label>
            <input type="date" name="release_date" value="{{ $movie->release_date }}"
                   class="w-full p-2 border rounded-lg">
        </div>

        <div>
            <label class="block font-semibold">Thể loại:</label>
            <select name="genre_id" class="w-full p-2 border rounded-lg">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600">
            Cập nhật
        </button>

        <a href="{{ route('movies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700">
            ⬅ Quay lại
        </a>
    </form>
</div>
@endsection
