<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    // Danh sách phim
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    // Hiển thị form thêm phim
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    // Lưu phim vào database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'intro' => 'required',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
        ]);

    // Xử lý ảnh upload
    if ($request->hasFile('poster')) {
        $posterPath = $request->file('poster')->store('posters', 'public');
    }

    // Lưu phim vào database
    Movie::create([
        'title' => $request->title,
        'poster' => $posterPath ?? null,
        'intro' => $request->intro, 
        'release_date' => $request->release_date,
        'genre_id' => $request->genre_id,
    ]);


    return redirect()->route('movies.index')->with('success', 'Phim đã được thêm thành công!');

}


    // Xem chi tiết phim
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Hiển thị form chỉnh sửa phim
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    // Cập nhật phim

public function update(Request $request, Movie $movie)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'poster' => 'image|mimes:jpg,jpeg,png|max:2048',
        'intro' => 'required|string',
        'release_date' => 'required|date',
        'genre_id' => 'required|exists:genres,id',
    ]);


    // Cập nhật thông tin phim
    $movie->title = $request->title;
    $movie->intro = $request->intro;
    $movie->release_date = $request->release_date;
    $movie->genre_id = $request->genre_id;

    // Xử lý file ảnh mới
    if ($request->hasFile('poster')) {
        // Xóa ảnh cũ nếu có
        if ($movie->poster) {
            Storage::delete('public/' . $movie->poster);
        }

        // Lưu ảnh mới vào storage/app/public/posters
        $path = $request->file('poster')->store('posters', 'public');
        $movie->poster = $path;
    }

    $movie->save();

    return redirect()->route('movies.index')->with('success', 'Cập nhật phim thành công!');
}


    // Xóa phim
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Xóa phim thành công!');
    }
}
