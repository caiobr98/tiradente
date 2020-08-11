@extends('layouts.main')
@section('title') Usuários App @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('usuarios-app')}}"><i class="fa fa-mobile"></i> Usuários App</a></li>
            <li class="active">
                Novo
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
                        <form class="row" action="{{url('usuarios-app')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="name" class="form-control" type="text" id="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input name="email" class="form-control" type="email" id="email" required>
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

                            <div class="col-md-12">
                                <a href="{{url('usuarios-app')}}" class="btn btn-info">
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
