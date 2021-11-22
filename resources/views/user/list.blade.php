@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Lista użytkowników</h2>
  <a href="{{ route('user.create') }}">Dodaj nowy user</a>
  <table class="table">
    <thead>
      <tr>
        <th>Nazwa</th>
        <th>Mail</th>
        <th>Data utworzenia</th>
        <th>Edycja</th>
        <th>Usuń</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      Opcje
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.show', ['user' => $user->id]) }}">Szczegóły</a>
                        <a class="dropdown-item" href="{{ route('user.edit', ['user' => $user->id]) }}">Edytuj</a>
                    </div>
                </div>
            </td>
            <td>
                <form action="/delete/{{$user->id}}" method="user">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">Usuń</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  {{$users->links()}}
</div>
@endsection
