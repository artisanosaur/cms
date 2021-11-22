@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($post))
        <h5 class="card-header">{{ $post->title }}</h5>
        <div class="card-body">
            @if ($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" class="rounded mx-auto d-block user-image">
            @endif
            <div>
                {{ $post->description }}
            </div>
            <div>
                <a href="{{ route('post.list') }}" class="btn btn-secondary">Lista postów</a>
                <a href="/post/edit/{{ $post->id }}" class="btn btn-secondary">Edytuj post</a>
            </div>
        </div>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
