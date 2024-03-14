@extends('layouts.app')
@section('title', 'Comentários do Usuário')
@section('content')

<h1 class="text-2xl font-semibol leading-tigh py-2">
    Comentários do Usuário: {{$user->name}}

</h1>

<div class="w-full flex justify-between items-center">
    <form action="{{ route('comments.index', $user->id) }}" method="get">
        <input type="text" name="search" placeholder="Nome ou E-mail" class="bg-gray-200 appearance-none px-2 py-1 mt-4 mb-4" />
        <button class="bg-purple-500 hover:bg-purple-400 text-white px-2 py-1 rounded-md">Pesquisar</button>
    </form>
    <a href="{{ route('comments.create', $user->id) }}" class="bg-blue-500 hover:bg-blue-400 text-white px-2 py-1 rounded-md"> + Comentário</a>
</div>

<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden mt-4">
  <thead>
    <tr>
      <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Conteúdo</th>
      <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Visível</th>
      <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Editar Novo</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($comments as $comment)
    <tr class="bg-white hover:bg-gray-100">
      <td class="border-b-2 border-gray-300 p-2">{{ $comment->body }}</td>
      <td class="border-b-2 border-gray-300 pl-4">{{ $comment->visible ? '✔' : '❌' }}</td>
      <td class="border-b-2 border-gray-300 px-2">
        <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}">
          <img src="{{ asset('assets/images/edit.png') }}" class="ml-4 hover:w-7" alt="edit" width="25" />
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
<div class="py-4 bg-white">
    {{ $comments->appends([
            'search' => request()->get('search', '')
        ])->links() }}
</div>
@endsection
