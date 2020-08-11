@extends('layouts.main')
@section('title') Editar Aluno @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('alunos')}}"><i class="fa fa-users"></i> Aluno </a></li>
            <li class="active">
                Editar
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
                        @include('parts.messages')
                        <form class="row" action="{{url('alunos/'.$aluno->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="nome" class="form-control" type="text" id="nome" required value="{{$aluno->nome}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">RG</label>
                                    <input name="rg" class="form-control" type="text" id="email" required value="{{$aluno->rg}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Celular</label>
                                    <input name="celular" class="form-control" type="text" id="email" required value="{{$aluno->telefone->celular}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Residencial</label>
                                    <input name="residencial" class="form-control" type="text" id="email" required value="{{$aluno->telefone->residencial}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Estado</label>
                                    <input name="estado" class="form-control" type="text" id="email" required value="{{$aluno->endereco->estado}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Cidade</label>
                                    <input name="cidade" class="form-control" type="text" id="email" required value="{{$aluno->endereco->cidade}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Bairro</label>
                                    <input name="bairro" class="form-control" type="text" id="email" required value="{{$aluno->endereco->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Rua</label>
                                    <input name="rua" class="form-control" type="text" id="email" required value="{{$aluno->endereco->rua}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Número</label>
                                    <input name="numero" class="form-control" type="text" id="email" required value="{{$aluno->endereco->numero}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Selecione a escola</label>

                                <select class="select form-control" id="escola" name="escola" >
                                    <option>Selecione a escola</option>
                                    @foreach ($escola as $item)
                                        <option selected="{{$aluno->escola ? $aluno->escola->id : null}}" value="{{$item->id}}">{{$item->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('alunos')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$aluno->id}}" name="id">
                                <button id="btnEditar" type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
