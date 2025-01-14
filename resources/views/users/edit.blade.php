@extends('users.layouts.app')
@section('title', 'Editar Usuário')
@section('content')

<a href="{{ route('user.index') }}">Listar Usuários</a>
<h1>oii</h1>

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($errors->any())
    @foreach($errors->all() as $error)
    <p style="color: red">{{ $error }}</p>
    @endforeach

    @endif

    <label>Nome:</label>
    <input type="text" name="name" placeholder="Informe seu nome" value="{{ $user->name ?? old('name') }}" /><br><br>

    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Informe seu e-mail" value="{{ $user->email ?? old('email') }}" /><br><br>

    <label>Senha:</label>
    <input type="password" name="password" placeholder="Informe uma senha segura"><br><br>

    <button type="submit">Cadastrar</button>
</form>

@endsection