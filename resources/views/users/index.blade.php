@extends('users.layouts.app')
@section('title', 'Listar Usuários')
@section('content')

<a href="{{ route('user.create') }}">Criar Usuário</a>
<h2>Listar Usuários</h2>

@if (session('success'))
<p style="color: green">{{ session('success') }}</p>
@endif

@forelse ($users as $user)
ID: {{ $user->id }}<br>
Nome: {{ $user->name }}<br>
E-mail: {{ $user->email }}<br>
<a href="{{ route('user.show', $user->id) }}">Exibir Detalhes</a><br>
<a href="{{ route('user.edit', $user->id) }}">Editar</a><br>
<form action="{{ route('user.destroy', $user->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Excluir</button>
</form>
<hr>

@empty
<p>Nenhum usuário encontrado</p>
@endforelse

{{ $users->links() }}
@endsection