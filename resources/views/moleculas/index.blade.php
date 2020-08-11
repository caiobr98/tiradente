@extends('layouts.main')
@section('title') Moléculas @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active"> / Moléculas </li>
        </ol>

        <div class="row">
            <div class="col-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Moléculas</h2>
                        <a class="pull-right btn btn-success" href="{{url('moleculas/create')}}">
                            Nova Molécula
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')

                        <table class="table table-striped data_table">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Laboratório</th>
                                <th>Molécula</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($moleculas as $m)
                                <tr>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->laboratorio}}</td>
                                    <td>{{$m->molecula}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url('moleculas/'.$m->id.'/edit')}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$m->id}}" data-id="{{$m->id}}">
                                            <i class="fa fa-times"></i> Excluir
                                        </a>
                                        @include('components.modal_delete', [ 'url' => 'moleculas/'.$m->id, 'id' => $m->id])
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
