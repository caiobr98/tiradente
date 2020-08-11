@extends('layouts.main')
@section('title') Usuários App @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                / Usuários App
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Usuários App</h2>
                        <a href="{{url('usuarios-app/create')}}" class="btn btn-success pull-right">
                            Novo Usuário App
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
                                <th>E-mail</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $u)
                                <tr>
                                    <td style="vertical-align: middle;">{{$u->id}}</td>
                                    <td style="vertical-align: middle;">{{$u->name}}</td>
                                    <td style="vertical-align: middle;">{{$u->email}}</td>
                                    <td style="vertical-align: middle;">
                                        @if($u->status == 0)
                                            Pendente
                                        @elseif($u->status == 1)
                                            Aprovado
                                        @else
                                            Reprovado
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <a class="btn btn-primary" href="{{url('usuarios-app/'.$u->id.'/edit')}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$u->id}}" data-id="{{$u->id}}">
                                            <i class="fa fa-times"></i> Excluir
                                        </a>
                                        @include('components.modal_delete', [ 'url' => 'usuarios-app/'.$u->id, 'id' => $u->id])


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
