@extends('layouts.app')

@section('content')
<div class="card mt-4 mb-4 border-light shadow">

    <div class="card-header hstack gap-2">
        <span>Listar Usuários</span>

        <span class="ms-auto">
            <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
            <a href="{{ route('user.list-soft-deleted') }}" class="btn btn-warning btn-sm">Restaurar Usuários</a>
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
                        <a href="{{ route('user.show', ['user' => $user->id]) }}"
                            class="btn btn-primary btn-sm">Visualizar</a>
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                            class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse

                <nav aria-label="...">
                    <ul class="pagination">
                        @if ($users->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Anterior</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1">Anterior</a>
                        </li>
                        @endif

                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}<span class="sr-only"></span></span>
                        </li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        @if ($users->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Próximo</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">Próximo</span>
                        </li>
                        @endif
                    </ul>
                </nav>

            </tbody>
        </table>
    </div>
</div>
@endsection