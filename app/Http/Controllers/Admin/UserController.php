<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Administrador\Administrador;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('administradores.index')->with([
            'usuarios' => User::where('role', 'admin')->get()
        ]);
    }
    
    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        $administrador = Administrador::create([
            'user_id' => $user->id
        ]);

        if($user || $administrador){
            return redirect('usuarios')->with('success', 'O usuário foi cadastrado com sucesso');
        }else{
            return redirect('usuarios')->with('error', 'Erro ao cadastrar usuário');
        }
    }
    
    public function edit($id)
    {
        return view('administradores.edit')->with([
            'usuario' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|confirmed'
        ]);

        $usuario['password'] = Hash::make($usuario['password']);

        if(User::find($usuario['id'])->update($usuario)){
            return redirect('usuarios')->with('success', 'O usuário foi editado com sucesso');
        }else{
            return redirect('usuarios')->with('error', 'Erro ao editar usuário');
        }
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $administrador = Administrador::where('user_id', $user->id)->delete();
        $user->delete();

        if($user || $administrador){
            return back()->with('success', 'O usuário foi excluido com sucesso');
        }else{
            return back()->with('error', 'Erro ao excluir usuário');
        }
    }
}
