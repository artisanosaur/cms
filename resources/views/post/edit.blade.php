@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edytuj post</h2>
        <form class="form-horizontal" action="/post/submitEdit/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @if($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" class="rounded mx-auto d-block user-image">
        @endif
        <label for="image">Wybierz image ...</label>
        <div class="form-group">
            <div class="form-group">
            <input
                    type="file"
                    class="form-control-file"
                    id="image"
                    name="image">
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Tytuł:</label>
            <div class="col-sm-10">
            <input class="form-control" placeholder="Wpisz tytuł" name="title" value="{{ $post->title }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"> Opis:</label>
            <div class="col-sm-10">
            <input  class="form-control" rows="5" placeholder="Wpisz opis" name="description" value="{{ $post->description }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-secondary">Zapisz</button>
            </div>
        </div>
        @csrf
        </form>
    </div>
@endsection
