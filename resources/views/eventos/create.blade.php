@extends('layouts.main')
@section('title') Nova Escola @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>  
            <li><a href="{{url('escolas')}}"><i class="fa fa-users"></i> Escolas </a></li>
            <li class="active">
                Novo
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nova Escola</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{url('escolas')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="nome" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Estado</label>
                                    <input name="estado" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Cidade</label>
                                    <input name="cidade" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Bairro</label>
                                    <input name="bairro" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Rua</label>
                                    <input name="rua" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Número</label>
                                    <input name="numero" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('escolas')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <button id="btnEditar" type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
