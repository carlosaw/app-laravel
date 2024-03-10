@extends('layouts.app')
@section('title', "Editar Comentário")
@section('content')

    <h1 class="text-2xl font-semibold leading-tigh py-2">
        Editar Comentário do usuário: {{ $user->name }}
    </h1>
    <div class="">
        @include('includes.validations-form')

        <form action="{{ route('comments.update', $comment->id) }}" method="post">
            @method('PUT')
            @include('users.comments._partials.form')
        </form>
    </div>


@endsection
