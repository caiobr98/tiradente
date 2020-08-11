@extends('layouts.main')
@section('title') Usuários App @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('usuarios-app')}}"><i class="fa fa-mobile"></i> Usuários App </a></li>
            <li class="active">
                Editar
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Usuários App</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{url('usuarios-app/'.$usuario->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="name" class="form-control" type="text" id="nome" required value="{{$usuario->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input name="email" class="form-control" type="email" id="email" required value="{{$usuario->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input name="password" class="form-control" type="password" id="senha" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="senha_confirmacao">Senha Confirmação</label>
                                    <input name="password_confirmation" class="form-control" type="password" id="senha_confirmacao" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option value="0" @if($usuario->status == 0) selected @endif>Pendente</option>
                                        <option value="1" @if($usuario->status == 1) selected @endif>Aprovado</option>
                                        <option value="2" @if($usuario->status == 2) selected @endif>Reprovado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('usuarios-app')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$usuario->id}}" name="id">
                                <button id="btnEditar" type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
