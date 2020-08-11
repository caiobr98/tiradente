<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Escola;
use App\Models\Endereco\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EscolaController extends Controller
{
    public function index()
    {
        $escola = Escola::all();
        
        return view('escolas.index')->with([
            'escola' => $escola
        ]);
    }
    
    public function create()
    {
        return view('escolas.create');
    }

    public function store(Request $request)
    {
        $endereco = Endereco::create([
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero
        ]); 

        $escola = Escola::create([
            'nome' => $request->nome,
            'endereco_id' => $endereco->id
        ]);

        if($endereco || $escola){
            return redirect('escolas')->with('success', 'A escola foi cadastrada com sucesso');
        }else{
            return redirect('escolas')->with('error', 'Erro ao cadastrar escola');
        }
    }
    
    public function edit($id)
    {
        return view('escolas.edit')->with([
            'escola' => Escola::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $escola = Escola::find($id);
        $endereco = Endereco::where('id', $escola->endereco_id)->first();
    
        $escola->update([
            'nome' => $request->nome
        ]);
        $endereco->update([
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero
        ]); 
        
        if(!$escola || !$endereco){
            return back()->with('error', 'Erro ao editar escola');
        } else {
            return redirect('escolas')->with('success', 'A escola foi editada com sucesso');
        }
    }
    
    public function destroy($id)
    {
        if(Escola::find($id)->delete()){
            return back()->with('success', 'O escola foi excluida com sucesso');
        }else{
            return back()->with('error', 'Erro ao excluir escola');
        }
    }
}
