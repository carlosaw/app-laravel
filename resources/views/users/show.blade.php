@extends('layouts.app')
@section('title', 'Listagem do USUÁRIO')
@section('content')

<div class="container mx-auto flex justify-center">
    <div class="w-2/3 p-8 bg-gray-100 shadow-md">
        <h1 class="text-2xl mb-8 text-center">Usuário: {{ $user->name }}</h1>
        <ul class="flex justify-between border-b-2 pb-2 mb-4">
            <li class="text-gray-800 font-semibold text-lg">{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
        </ul>
        <form action="{{ route('users.delete', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="bg-red-500 text-white px-4 py-1 rounded-md hover:opacity-75"
            onclick="return confirm(`Tem certeza? Excluir?`)" type="submit">Excluir</button>
        </form>
    </div>
</div>
@endsection
