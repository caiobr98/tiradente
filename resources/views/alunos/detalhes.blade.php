@extends('layouts.main')
@section('title') Alunos @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('alunos')}}"><i class="fa fa-users"></i> Alunos </a></li>
            <li class="active">
                Alunos
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alunos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input name="nome" class="form-control" value="{{ $aluno->nome }}" type="text" id="nome" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">RG</label>
                                <input name="rg" class="form-control cpf-mask" value="{{ $aluno->rg }}" type="text" id="rg" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Celular</label>
                                <input name="celular" class="form-control" value="{{ $aluno->telefone->celular }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Residencial</label>
                                <input name="residencial" class="form-control" value="{{ $aluno->telefone->residencial }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Estado</label>
                                <input name="estado" class="form-control" value="{{ $aluno->endereco->estado }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Cidade</label>
                                <input name="cidade" class="form-control" value="{{ $aluno->endereco->cidade }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Bairro</label>
                                <input name="bairro" class="form-control" value="{{ $aluno->endereco->bairro }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Rua</label>
                                <input name="rua" class="form-control" type="text" value="{{ $aluno->endereco->rua }}" id="identificacao" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Número</label>
                                <input name="numero" class="form-control" value="{{ $aluno->endereco->numero }}" type="text" id="identificacao" required disabled>
                            </div>
                        </div>
        
                        <div class="col-md-12">
                            <a href="{{url('alunos')}}" class="btn btn-info">
                                Voltar
                            </a>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
