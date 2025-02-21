@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Thêm phim</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="grid grid-cols-2 gap-4">
            <!-- Tiêu đề -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Tiêu đề:</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ảnh Áp Phích -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Áp phích:</label>
                <input type="file" name="poster"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('poster') border-red-500 @enderror">
                @error('poster')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Giới thiệu -->
            <div class="col-span-2">
                <label class="block text-gray-700 font-semibold mb-1">Giới thiệu:</label>
                <textarea name="intro"
                          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('intro') border-red-500 @enderror">{{ old('intro') }}</textarea>
                @error('intro')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ngày chiếu -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Ngày chiếu:</label>
                <input type="date" name="release_date" value="{{ old('release_date') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('release_date') border-red-500 @enderror">
                @error('release_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thể loại -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Thể loại:</label>
                <select name="genre_id"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('genre_id') border-red-500 @enderror">
                    <option value="">-- Chọn thể loại --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Nút lưu -->
        <div class="mt-4 text-right">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Lưu
            </button>
        </div>
    </form>
</div>
@endsection
