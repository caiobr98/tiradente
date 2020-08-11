<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Models\Colaborador\Colaborador;
use App\Models\Coordenador\Coordenador;
use App\Models\Banco\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaborador = Colaborador::all();

        return view('colaboradores.index')->with([
            'colaborador' => $colaborador
        ]);
    }
    
    public function create()
    {
        return view('colaboradores.create');
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
            'role' => 'colaborador'
        ]);

        $colaborador = Colaborador::create([
            'user_id' => $user->id,
            'cro' => $request->cro,
            'rg' => $request->cro,
            'cpf' => $request->cro,
            'pis' => $request->cro,
            'foto' => $request->cro,
        ]);

        if($user || $colaborador){
            return redirect('colaboradores')->with('success', 'O colaborador foi cadastrado com sucesso');
        }else{
            return redirect('colaboradores')->with('error', 'Erro ao cadastrar colaborador');
        }
    }
    
    public function edit($id)
    {
        $colaborador = Colaborador::find($id);
        return view('colaboradores.edit')->with([
            'colaborador' => $colaborador
        ]);
    }

    public function detalhes($id)
    {
        $colaborador = Colaborador::find($id);
        return view('colaboradores.detalhes')->with([
            'colaborador' => $colaborador
        ]);
    }

    public function update(Request $request, $id)
    {
        $colaborador = Colaborador::find($id);
        $email = User::where('email', $request->email)->first();
        //$user = User::join('colaboradores', 'colaboradores.user_id', 'users.id')->where('users.id', $colaborador->user_id)->first();
        $user = User::where('id', $colaborador->user_id)->first();
        if(!$email){
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]); 

            $colaborador->update([
                'identificacao' => $request->identificacao
            ]);
            
            if(!$user || !$colaborador){
                return back()->with('error', 'Erro ao editar colaborador');
            } else {
                return redirect('colaboradores')->with('success', 'O colaborador foi editado com sucesso');
            }
            
        } elseif($request->email == $user->email){
            $colaborador->update([
                'identificacao' => $request->identificacao
            ]);
            $user->update([
                'name' => $request->name
            ]); 
            
            if(!$colaborador){
                return back()->with('error', 'Erro ao editar colaborador');
            } else {
                return redirect('colaboradores')->with('success', 'O colaborador foi editado com sucesso');
            }
        } else {
            return back()->with('error', 'E-mail já cadastrado.');
        }
        
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $colaborador = Colaborador::where('user_id', $user->id)->delete();
        $user->delete();

        if($user || $colaborador){
            return back()->with('success', 'O colaborador foi excluido com sucesso');
        }else{
            return back()->with('error', 'Erro ao excluir colaborador');
        }
    }

    public function cadastroTela(){
        return view('cadastroColaborador.cadastro');
    }
    
    public function cadastro(Request $request){
        $dados = $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:users,email',
            'agencia' => 'required',
            'conta' => 'required',
            'digito' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'foto' => 'required',
            'pis' => 'required',
            'cro' => 'required'
        ]);

        $foto = $dados['foto']->store('app/public/images/avatar');
        $pis = $dados['pis']->store('app/public/images/pis');
        $cpf = $dados['cpf']->store('app/public/images/cpf');
        
        $foto = $dados['foto'];
        $pis = $dados['pis'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];

        $nameFoto = time().'.'.$foto->getClientOriginalExtension();
        $destinationPathFoto = public_path('/images/avatar');
        $foto->move($destinationPathFoto, $nameFoto);

        $namePis = time().'.'.$pis->getClientOriginalExtension();
        $destinationPathPis = public_path('/images/pis');
        $pis->move($destinationPathPis, $namePis);

        $nameCpf = time().'.'.$cpf->getClientOriginalExtension();
        $destinationPathCpf = public_path('/images/cpf');
        $cpf->move($destinationPathCpf, $nameCpf);

        $nameRg = time().'.'.$rg->getClientOriginalExtension();
        $destinationPathRg = public_path('/images/rg');
        $rg->move($destinationPathRg, $nameRg);

        $u = User::create([
            'name' => $dados['nome'],
            'email' => $dados['email'],
            'avatar' => $nameFoto,
            'password' => Hash::make('alterar123'),
            'role' => 'colaborador'
        ]);

        $c = Colaborador::create([
            'user_id' => $u->id,
            'cro' => $dados['cro'],
            'img_pis' => $namePis, 
            'img_cpf' => $nameCpf,
            'img_rg' => $nameRg,
            'aprovado' => 1
        ]);

        $b = Banco::create([
            'colaborador_id' => $c->id,
            'agencia' => $dados['agencia'],
            'conta' => $dados['conta'],
            'digito' => $dados['digito']
        ]);
        
        if($u and $c and $b)
            return redirect('/');
        
        return back()->with('error', 'Há erro no fomulário.'); 
    }

    public function aprovar($id) {
        $c = Colaborador::find($id);
        $c->aprovado = 0;
        $c->save();

        if($c){
            return redirect('colaboradores');
        }

        return back()->with('error', 'Erro ao aprovar colaborador.');
    }

    public function desligar($id) {
        $c = Colaborador::find($id);
        $c->aprovado = 2;
        $c->save();

        if($c){
            return redirect('colaboradores');
        }

        return back()->with('error', 'Erro ao aprovar colaborador.');
    }

    public function tornarCoordenador($id){
        $c = Colaborador::find($id);
        $c->update([
            'coordenador' => 1
        ]);
        
        Coordenador::updateOrCreate([
           'id_colaborador' => $c->id
        ]);

        return back()->with('success', 'Colaborador virou coordenador.');
    }
    public function excluirCoordenador($id){
        $c = Colaborador::find($id);
        $c->update([
            'coordenador' => 0
        ]);

        Coordenador::where('id_colaborador', $c->id)->delete();

        return back()->with('success', 'Colaborador virou coordenador.');
    }
    
}
