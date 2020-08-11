@extends('layouts.main')
@section('title') Eventos @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                Escola
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Escolas</h2>
                        <a href="{{url('escolas/create')}}" class="btn btn-success pull-right">
                            Nova Escola
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <table class="table data_table">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Estado</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($escola as $e)
                                <tr>
                                    <td style="vertical-align: middle;">{{$e->id}}</td>
                                    <td style="vertical-align: middle;">{{$e->nome}}</td>
                                    <td style="vertical-align: middle;">{{$e->endereco->estado}}</td>
                                    <td style="vertical-align: middle;">{{$e->endereco->cidade}}</td>
                                    <td style="vertical-align: middle;">{{$e->endereco->bairro}}</td>
                                    <td style="vertical-align: middle;">{{$e->endereco->rua}}</td>
                                    <td style="vertical-align: middle;">{{$e->endereco->numero}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('escolas/'.$e->id.'/edit')}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$e->id}}" data-id="{{$e->id}}">
                                            <i class="fa fa-times"></i> Excluir
                                        </a>
                                        @include('components.modal_delete', [ 'url' => 'escolas/'.$e->id, 'id' => $e->id])
                                    </td>
                                    
                                    {{-- <td style="vertical-align: middle;">
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$e->id}}" data-id="{{$e->id}}">
                                            <i class="fa fa-times"></i> Excluir
                                        </a>
                                        @include('components.modal_delete', [ 'url' => 'escolas/'.$e->id, 'id' => $e->id])


                                    </td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
