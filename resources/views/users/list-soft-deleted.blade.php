@extends('layouts.app')

@section('content')
<div class="card mt-4 mb-4 border-light shadow">

    <div class="card-header hstack gap-2">
        <span>Listar Usuários</span>

        <span class="ms-auto">
            <a href="{{ route('user.index') }}" class="btn btn-success btn-sm">Listar Usuários</a>
        </span>
    </div>

    <div class="card-body">

        <x-alert />

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.restore', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Restaurar</a>

                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection