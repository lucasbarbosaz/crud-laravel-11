<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request) {

        $data = $request->validated();

        //Cadastra usuário
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        //Redirecionar usuário e exibir mensagem de sucesso.
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email']);

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete(); //você pode usar o forceDelete para deletar permanentemente caso esteja usando softDeletes

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }

    public function listSoftDeleted()
    {
        $users = User::onlyTrashed()->paginate(10);

        return view('users.list-soft-deleted', compact('users'));
    }

    public function restore($id)
    {
        $data = User::withTrashed()->findOrFail($id);
        $data->restore();

        return redirect()->back()->with('success', 'Usuário restaurado com sucesso!');
    }
}
