@extends('layouts.app')
@section('title', 'Novo Usuário')
@section('content')


    @include('includes.validations-form')

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('users._partials.form')
    </form>
@endsection
