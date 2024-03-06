@extends('layouts.app')
@section('title', 'Listagem dos Usuários')
@section('content')

    <h1>Listagem dos Usuários</h1>
    (<a href="{{ route('users.create') }}">+</a>)
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                <a href="{{ route('users.edit', $user->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
