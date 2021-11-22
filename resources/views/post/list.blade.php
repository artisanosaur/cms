@extends('layouts.app')
@section('content')
<div class="container">
  <h2>Lista postów</h2>
  <a href="/post/create">Dodaj nowy post</a>
  <table class="table">
    <thead>
      <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Data utworzenia</th>
        <th>Edycja</th>
        <th>Usuń</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      Opcje
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('post.post', ['post' => $post->id]) }}">Szczegóły</a>
                        <a class="dropdown-item" href="{{ route('post.edit', ['post' => $post->id]) }}">Edytuj</a>
                    </div>
                </div>
            </td>
            <td>
                <form action="/post/delete/{{$post->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">Usuń</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  {{$posts->links()}}
</div>
@endsection
