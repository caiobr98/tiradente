<?php

namespace App\Http\Controllers\Coordenador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Coordenador\Coordenador;
use App\Models\Banco\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class CoordenadorController extends Controller
{
    public function index()
    {
        $c = Coordenador::join('colaboradores', 'colaboradores.id', 'coordenadores.id_colaborador')
        ->join('users', 'users.id', 'colaboradores.user_id')
        ->get();
        
        return view('coordenador.index')->with([
            'coordenador' => $c
        ]);
    }
    
    public function create()
    {

    }

    public function store(Request $request)
    {

    }
    
    public function edit($id)
    {

    }

    public function detalhes($id)
    {

    }

    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {

    }
}
