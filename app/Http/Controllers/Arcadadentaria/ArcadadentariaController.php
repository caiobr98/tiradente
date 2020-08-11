<?php

namespace App\Http\Controllers\Arcadadentaria;

use App\Http\Controllers\Controller;
use App\Models\Arcadadentaria\Arcadadentaria;
use Illuminate\Http\Request;
use App\User;
use DB;

class ArcadadentariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::selectRaw(
                'users.id as user_id,
                users.name,
                arcadadentarias.id as arcadadentarias_id,
                arcadadentarias.created_at'
            )
            ->join('arcadadentarias', 'arcadadentarias.user_id', 'users.id')
            //->groupBy(DB::raw('users.id', DATE('arcadadentarias.created_at')))
            ->get();

        return view('arcadadentaria.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        
        return view('arcadadentaria.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->dente as $key => $value) {
            if (is_null($value)) 
                continue;

            Arcadadentaria::create([
                'user_id' => $request->id,
                'arcadadentarias_tipo_id' => $request->problema[$key],
                'descricao' => $request->descricao[$key],
                'arcadadentarias_dente_id' => $value
            ]);
        }
        

        return back()->withSuccess('Arcadadentaria cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $items = User::select(
            'users.id',
            'users.name',
            'arcadadentarias.id',
            'arcadadentarias.created_at',
            'arcadadentarias.descricao',
            'arcadadentarias.arcadadentarias_tipo_id',
            'arcadadentarias.arcadadentarias_dente_id'
        )
        ->join('arcadadentarias', 'arcadadentarias.user_id', 'users.id')
        ->where('arcadadentarias.user_id', $id)
        ->whereDate('arcadadentarias.created_at', $request->arcadadentarias_created_at)
        ->get();
        
        // $dentes = [];
        // foreach($items as $key => $value){
        //     $dentes[$value['arcadadentarias_dente_id']][$key] = $value;
        // } 
        $user = User::findOrFail($id);


        return view('arcadadentaria.edit', compact('user', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
