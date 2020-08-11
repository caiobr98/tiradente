@extends('layouts.main')
@section('title') Colaboradores @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('colaboradores')}}"><i class="fa fa-users"></i> Colaboradores </a></li>
            <li class="active">
                Detalhes
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
                        <form class="row" action="{{url('aprovar/colaborador/'.$colaborador->id)}}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="name" class="form-control" type="text" id="nome" required value="{{$colaborador->user->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input name="email" class="form-control" type="email" id="email" required value="{{$colaborador->user->email}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="email">CRO</label>
                                    <input name="identificacao" class="form-control" type="text" id="identificacao" required value="{{$colaborador->cro}}" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label for="image" class="col-sm-2 col-form-label">PIS</label>
                                <div class="col-sm-7">
                                    <img src="{{asset("images/pis/$colaborador->img_pis")}}" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="col-sm-2 col-form-label">RG</label>
                                <div class="col-sm-7">
                                    <img src="{{asset("images/rg/$colaborador->img_rg")}}" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-7">
                                    <img src="{{asset("images/avatar/".$colaborador->user->avatar)}}" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="col-sm-2 col-form-label">CPF</label>
                                <div class="col-sm-7">
                                    <img src="{{asset("images/cpf/$colaborador->img_cpf")}}" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{url('colaboradores')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$colaborador->id}}" name="id">
                                @if ($colaborador->aprovado == 0)
                                    <a href="{{url('desligar/colaborador', $colaborador->id)}}" id="btnEditar" type="submit" class="btn btn-danger">Desligar colaborador</a>
                                @elseif($colaborador->aprovado == 1 or $colaborador->aprovado == 2)
                                    <button id="btnEditar" type="submit" class="btn btn-success">Aprovar</button>    
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
