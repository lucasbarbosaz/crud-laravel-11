@extends('users.layouts.app')
@section('title', 'Editar Usuário')
@section('content')

<a href="{{ route('user.index') }}">Listar Usuários</a><br>
<a href="{{ route('user.edit', $user->id) }}">Editar este usuário</a>
<h2>Editar usuário</h2>

ID: {{ $user->id }} <br>
Nome: {{ $user->name }} <br>
E-mail: {{ $user->email }} <br>
Cadastrado: {{ $user->created_at->format('d/m/Y H:i:s') }} <br>


@endsection