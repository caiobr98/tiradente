<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Aluno\Aluno;
use App\Models\Escola\Escola;
use App\Models\Endereco\Endereco;
use App\Models\Telefone\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

class AlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::with('escola')->with('pagamento')->get();
        // $aluno = Aluno::leftJoin('pagamento_consulta_aluno', 'pagamento_consulta_aluno.id', 'alunos.id')
        //     ->leftJoin('escolas', 'escolas.id', 'alunos.escola_id')
        //     ->get();
    
        return view('alunos.index')->with([
            'aluno' => $aluno
        ]);
    }
    
    public function create()
    {
        $escola = Escola::all();
        return view('alunos.create')->with([
            'escola' => $escola
        ]);
    }

    public function store(Request $request)
    {
        $aluno = $request->validate([
            'nome' => 'required|string|max:255',
            'rg' => 'required|string|max:255|unique:alunos'
        ]);

        $endereco = Endereco::create([
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'numero' => $request->numero,
            'estado' => $request->estado
        ]);

        $telefone = Telefone::Create([
            'celular' => $request->celular,
            'residencial' => $request->residencial
        ]);

        $aluno = Aluno::create([
            'nome' => $request->nome,
            'rg' => $request->rg,
            'endereco_id' => $endereco->id,
            'telefone_id' => $telefone->id,
            'escola_id' => $request->escola
        ]);

        if($aluno || $endereco || $telefone){
            return redirect('alunos')->with('success', 'O aluno foi cadastrado com sucesso');
        }else{
            return redirect('alunos')->with('error', 'Erro ao cadastrar aluno');
        }
    }
    
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $escola = Escola::all();
        return view('alunos.edit')->with([
            'aluno' => $aluno,
            'escola' => $escola
        ]);
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $endereco = Endereco::where('id', $aluno->endereco_id)->first();
        $telefone = Telefone::where('id', $aluno->telefone_id)->first();

        $aluno->update([
            'nome' => $request->nome,
            'rg' => $request->rg,
            'escola_id' => $request->escola
        ]);

        $endereco->update([
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
        ]);

        $telefone->update([
            'celular' => $request->celular,
            'residencial' => $request->residencial,
        ]);
        
        if($aluno || $endereco || $telefone){
            return redirect('alunos')->with('success', 'O aluno foi editado com sucesso');
        } else {
            return back()->with('error', 'Erro ao editar aluno');
        }
    }
    
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        $endereco = Endereco::where('id', $aluno->endereco_id)->delete();
        $telefone = Telefone::where('id', $aluno->telefone_id)->delete();
        $aluno->delete();

        if($aluno || $endereco || $telefone){
            return back()->with('success', 'O aluno foi excluido com sucesso');
        }else{
            return back()->with('error', 'Erro ao excluir aluno');
        }
    }

    public function show()
    {
        $escola = Escola::all();

        return view('alunos.formImportar')->with([
            'escola' => $escola
        ]);
    }

    public function importar(Request $request)
    {
        // $row = 1;
        // if (($handle = fopen($request->csv_file, "r")) !== FALSE) {
        // while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //     $num = count($data);
        //     echo "<p> $num fields in line $row: <br /></p>\n";
        //     $row++;
        //     for ($c=0; $c < $num; $c++) {
        //         dd($data[$c]);
        //     }
        // }
        // fclose($handle);
        // }
        $handle = fopen($request->csv_file, "r");
        $row = 0;
    
        // foreach (fgetcsv($handle, 1000, ";") as $key => $value) {
        //     dd($key[2]);
        // }
        while ($line = fgetcsv($handle, 1000, ";")) {
            if ($row++ == 0) {
                continue;
            }
            
            $people[] = [
                'nome' => $line[0],
                'rg' => $line[1],
                'celular' => $line[2],
                'residencial' => $line[3],
                'estado' => $line[4],
                'cidade' => $line[5],
                'bairro' => $line[6],
                'rua' => $line[7],
                'numero' => $line[8],
            ];

            foreach ($people as $key => $value) {
                $telefone = Telefone::create([
                    'celular' => $value['celular'],
                    'residencial' =>$value['residencial'],
                ]);
                
                $endereco = Endereco::create([
                    'estado' =>$value['estado'],
                    'cidade' =>$value['cidade'],
                    'bairro' =>$value['bairro'],
                    'rua' =>$value['rua'],
                    'numero' =>$value['numero'],
                ]);

                $aluno = Aluno::create([
                    'nome' => $value['nome'],
                    'rg' => $value['rg'],
                    'telefone_id' => $telefone->id,
                    'endereco_id' => $endereco->id,
                    'escola_id' => $request->escola
                ]);
            }
        }

        fclose($handle);

        return redirect('alunos')->with('success', 'Alunos importados.');
    }

    public function detalhes($id)
    {
        $aluno = Aluno::find($id);
        $aluno->with('endereco')->with('escola')->get();

        return view('alunos.detalhes')->with([
            'aluno' => $aluno
        ]);
    }
}
