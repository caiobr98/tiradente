@extends('layouts.main')
@section('title') Colaboradores @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                Coordenadores
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Coordenadores</h2>
                        {{-- <a href="{{url('colaboradores/create')}}" class="btn btn-success pull-right">
                            Novo Coordenador
                        </a> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <table class="table data_table">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>cro</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coordenador as $c)
                          
                                <tr>
                                    <td style="vertical-align: middle;">{{$c->id}}</td>
                                    <td style="vertical-align: middle;">{{$c->name}}</td>
                                    <td style="vertical-align: middle;">{{$c->cro}}</td>

                                    <td style="vertical-align: middle;">
                                        {{-- <a class="btn btn-info" href="{{url('/colaboradores/detalhes/'.$c->id)}}">
                                            <i class="fa fa-eye"></i> Detalhes
                                        </a>
                                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#delete{{$c->id}}" data-id="{{$c->id}}"> 
                                            <i class="fa fa-times"></i> Tornar Coordenador
                                        </a>
                                        <a class="btn btn-primary" href="{{url('colaboradores/'.$c->id.'/edit')}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$c->id}}" data-id="{{$c->id}}"> 
                                            <i class="fa fa-times"></i> Excluir
                                        </a> --}}
                                        
                                        @include('components.modal_delete', [ 'url' => 'colaboradores/'.$c->id, 'id' => $c->id])
                                    </td>
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
