@extends('layouts.app')
@section('title', "Editar Usuário")
@section('content')

    @include('includes.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection
