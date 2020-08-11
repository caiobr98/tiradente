@extends('layouts.main')
@section('title') Colaboradores @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('colaboradores')}}"><i class="fa fa-users"></i> Colaboradores </a></li>
            <li class="active">
                Editar
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Colaboradores</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{url('colaboradores/'.$colaborador->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="name" class="form-control" type="text" id="nome" required value="{{$colaborador->user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input name="email" class="form-control" type="email" id="email" required value="{{$colaborador->user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Identificação</label>
                                    <input name="identificacao" class="form-control" type="text" id="identificacao" required value="{{$colaborador->identificacao}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('colaboradores')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$colaborador->id}}" name="id">
                                <button id="btnEditar" type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
