@extends('users.layouts.app')
@section('title', 'Criar Usuário')
@section('content')

<a href="{{ route('user.index') }}">Listar Usuário</a>
<h2>Criar usuário</h2>

<form action="{{ route('user.store') }}" method="POST">
    @csrf
    @method('POST')

    @if ($errors->any())
    @foreach($errors->all() as $error)
    <p style="color: red">{{ $error }}</p>
    @endforeach

    @endif

    <label>Nome:</label>
    <input type="text" name="name" placeholder="Informe seu nome" value="{{ old('name') }}" /><br><br>

    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Informe seu e-mail" value="{{ old('email') }}" /><br><br>

    <label>Senha:</label>
    <input type="password" name="password" placeholder="Informe uma senha segura"><br><br>

    <button type="submit">Cadastrar</button>
</form>
@endsection