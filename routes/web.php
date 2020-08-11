<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes([
    //'register' => false,
    'verify' => false
]);

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

//Route::group(['prefix' => 'admin', 'as' => 'admin' . '.', 'middleware'=>['auth', 'Role:admin']], function () {
    Route::resource('usuarios', 'Admin\UserController')->except(['show']);
    Route::resource('usuarios', 'Admin\UserController')->except(['show']);
    //Route::get('/home', 'DashboardController@index')->name('dash');


    Route::resource('colaboradores', 'Colaborador\ColaboradorController');
    Route::resource('coordenadores', 'Coordenador\CoordenadorController');
    Route::get('/tornar/coordenador/{id}', 'Colaborador\ColaboradorController@tornarCoordenador');
    Route::get('/excluir/coordenador/{id}', 'Colaborador\ColaboradorController@excluirCoordenador');
    Route::get('/colaboradores/detalhes/{id}', 'Colaborador\ColaboradorController@detalhes');
    Route::get('/aprovar/colaborador/{id}', 'Colaborador\ColaboradorController@aprovar');
    Route::get('/desligar/colaborador/{id}', 'Colaborador\ColaboradorController@desligar');

    Route::resource('alunos', 'Aluno\AlunoController');
    Route::get('/alunos/detalhes/{aluno}', 'Aluno\AlunoController@detalhes');
    Route::get('/alunos/importar-form', 'Aluno\AlunoController@show')->name('form-importar');
    Route::post('/alunos/importar', 'Aluno\AlunoController@importar')->name('importar');

    Route::resource('escolas', 'Escola\EscolaController');
    
    Route::resource('arcadadentaria', 'Arcadadentaria\ArcadadentariaController');
//});


/*
|------------------------------------------------------------------------------------
| Colaboradores                                                                     
|------------------------------------------------------------------------------------
*/
    Route::get('/cadastro-colaborador', 'Colaborador\ColaboradorController@cadastroTela');
    Route::post('/cadastro-colaborador-novo', 'Colaborador\ColaboradorController@cadastro');
/*
|------------------------------------------------------------------------------------
| Gestores                                  
|------------------------------------------------------------------------------------
*/

/*
|------------------------------------------------------------------------------------
| Pais
|------------------------------------------------------------------------------------
*/



Route::get('/home', 'HomeController@index');

// Route::resource('moleculas', 'MoleculaController')->except(['show']);

// Route::resource('usuarios', 'Admin\UserController')->except(['show']);

// Route::resource('arcadadentaria', 'Arcadadentaria\ArcadadentariaController');

// Route::resource('colaboradores', 'Colaborador\ColaboradorController')->except(['show']);

// Route::get('relatorio-buscas', 'RelatorioController@buscas');

// Route::resource('perfil', 'PerfilController')->only(['edit', 'update']);

// Route::get('redefinir-senha/{token}', 'UserAppController@redefinirEdit');

// Route::post('redefinir-senha', 'UserAppController@redefinirUpdate');