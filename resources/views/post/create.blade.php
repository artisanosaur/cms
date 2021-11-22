@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dodaj nowy post</h2>
        <form class="form-horizontal" action="/post/submitCreate" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group">
                <label for="avatar">Wybierz grafike ...</label>
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
            <label class="control-label col-sm-2">Tytuł:</label>
            <div class="col-sm-10">
            <input class="form-control" placeholder="Wpisz tytuł" name="title">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Tekst:</label>
            <div class="col-sm-10">
                <textarea class="form-control" placeholder="Wpisz opis" rows="5" name="description"></textarea>
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
