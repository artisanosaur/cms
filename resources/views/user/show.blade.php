@extends('layouts.app')

@section('content')
<div class="card">
    @if(!empty($user))
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $user->id }}</li>
                <li>Nazwa: {{ $user->name }}</li>
                <li>Email:{{ $user->email }}</li>
            </ul>

            <a href="{{ route('user.list') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
