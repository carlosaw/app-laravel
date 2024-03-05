@extends('layouts.app')
@section('title', 'Listagem do USUÁRIO')
@section('content')
    <h1>Listagem do USUÁRIO {{ $user->name }}</h1>
    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>
@endsection
