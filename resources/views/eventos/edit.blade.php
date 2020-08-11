@extends('layouts.main')
@section('title') Escolas @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('escolas')}}"> Escola </a></li>
            <li class="active">
                Editar
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Escola</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{url('escolas/'.$escola->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="nome" class="form-control" type="text" id="nome" required value="{{$escola->nome}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Estado</label>
                                    <input name="estado" class="form-control" type="text" id="nome" required value="{{$escola->endereco->estado}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Cidade</label>
                                    <input name="cidade" class="form-control" type="text" id="nome" required value="{{$escola->endereco->cidade}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Bairro</label>
                                    <input name="bairro" class="form-control" type="text" id="nome" required value="{{$escola->endereco->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Rua</label>
                                    <input name="rua" class="form-control" type="text" id="nome" required value="{{$escola->endereco->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Número</label>
                                    <input name="numero" class="form-control" type="text" id="nome" required value="{{$escola->endereco->numero}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('escolas')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$escola->id}}" name="id">
                                <button id="btnEditar" type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
