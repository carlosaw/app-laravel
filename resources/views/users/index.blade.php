@extends('layouts.app')
@section('title', 'Listagem dos Usuários')
@section('content')

  <h1 class="text-2xl font-semibol leading-tigh py-2">Listagem dos Usuários
    <a href="{{ route('users.create') }}" class="bg-blue-900 rounded-full text-white px-4 text-sm">+</a>
  </h1>

  <form action="{{ route('users.index') }}" method="get">
    <input type="text" name="search" placeholder="Nome ou E-mail"
      class="md:w-1/3 bg-gray-200 appearance-none px-2 py-1 mt-4 mb-4" />
    <button class="bg-purple-500 hover:bg-purple-400 text-white px-2 py-1 rounded-md">Pesquisar</button>
  </form>

  <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden mt-4">
    <thead>
      <tr>
        <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Nome</th>
        <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">E-mail</th>
        <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Editar</th>
        <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left ">Detalhes</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($users as $user)
        <tr class="bg-white hover:bg-gray-100">
          <td class="border-b border-b-2 border-gray-300 p-2">{{ $user->name }}</td>
          <td class="border-b border-b-2 border-gray-300 p-2">{{ $user->email }}</td>
          <td class="border-b border-b-2 border-gray-300 px-2">
            <a href="{{ route('users.edit', $user->id) }}">
              <img src="{{ asset('assets/images/edit.png') }}" class="ml-4 hover:w-7" alt="edit" width="25" />
            </a>
          </td>
          <td class="border-b border-b-2 border-gray-300 px-2">
            <a href="{{ route('users.show', $user->id) }}">
              <img src="{{ asset('assets/images/details.png') }}" class="ml-4 hover:w-7" alt="details" width="25" />
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>

  </table>

@endsection
