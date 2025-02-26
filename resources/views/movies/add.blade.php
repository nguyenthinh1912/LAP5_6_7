@extends('homes.layouts')
@section('title','Add New Movie')
@section('content')
    <form action="{{route('add_movie')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Poster</label>
            <input type="file" name="poster" class="form-control">
            @error('poster')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Intro</label>
            <input type="text" name="intro" class="form-control">
            @error('intro')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Release_date</label>
            <input type="date" name="release_date" class="form-control">
            @error('release_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" name="gene_id">
            <option value="">...</option>
                @foreach($genes as $gene)
                    <option value="{{$gene->id}}">{{$gene->name}}</option>
                @endforeach
            </select>
            @error('gene_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="gap-2 col-2  mx-auto">
            <button type="submit" class="btn btn-primary ">Save</button>
            <a href="{{ route('movie') }}" class="btn btn-primary">List Movie</a>
        </div>
    </form>

@endsection
