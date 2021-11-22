@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edytuj user</h2>
        <form class="form-horizontal" action="/user/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @if($user->avatar)
            <img src="{{ asset('storage/'. $user->avatar) }}" class="rounded mx-auto d-block user-avatar">
        @else
            <img src="/storage/images/avatar.png" class="rounded mx-auto d-block">
        @endif

        <div class="form-group">
            <div class="form-group">
                <label for="avatar">Wybierz avatar ...</label>
                <input
                    type="file"
                    class="form-control-file"
                    id="avatar"
                    name="avatar">
                @error('avatar')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Nazwa:</label>
            <div class="col-sm-10">
            <input class="form-control" placeholder="Wpisz nazwę" name="name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"> Email:</label>
            <div class="col-sm-10">
            <input  class="form-control" placeholder="Wpisz adres email" name="email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Zapisz</button>
            </div>
        </div>
        @csrf
        </form>
    </div>
@endsection
