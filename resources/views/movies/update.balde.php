@extends('homes.layouts')
@section('title','Edit Movie')
@section('content')

    <form action="{{ route('update_movie', ['id' => $movie->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" value="{{$movie->title}}" class="form-control">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Poster</label>
            <img src="{{ asset('storage/' . $movie->poster) }}" width="90"><br>
            <input type="file" name="poster" class="form-control">
            @error('poster')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Intro</label>
            <input type="text" name="intro" value="{{$movie->intro}}" class="form-control">
            @error('intro')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Release_date</label>
            <input type="datetime-local" name="release_date" value="{{$movie->release_date}}" class="form-control">
            @error('release_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" name="gene_id">
                @foreach($genes as $gene)
                    <option value="{{$gene->id}}" @selected($gene->id == $movie->gene_id)>{{$gene->name}}</option>
                @endforeach
            </select>
            @error('gene_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="gap-2 col-2  mx-auto">
            <button type="submit" class="btn btn-primary ">Update</button>
            <a href="{{ route('movie') }}" class="btn btn-primary">List Movie</a>
        </div>
    </form>

@endsection
