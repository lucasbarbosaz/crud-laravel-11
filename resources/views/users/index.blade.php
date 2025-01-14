<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
</head>
<body>

    <a href="{{ route('user.create') }}">Criar Usuário</a>
    <h2>Listar Usuários</h2>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @forelse ($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user->name }}<br>
        E-mail: {{ $user->email }}<br><hr>
    @empty
        <p>Nenhum usuário encontrado</p>
    @endforelse

    {{ $users->links() }}
</body>
</html>