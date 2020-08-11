@extends('layouts.main')
@section('title') Alunos @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                Alunos
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alunos</h2>
                        <a href="{{url('alunos/create')}}" class="btn btn-success pull-right">
                            Novo Aluno
                        </a>
                        <a href="{{route('form-importar')}}" class="btn btn-primary pull-right">
                            Importar alunos
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
                                <th>Rg</th>
                                <th>Escola</th>
                                <th>Autorização</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                            @foreach($aluno as $a)
                                <tr>
                                    <td style="vertical-align: middle;">{{$a->id}}</td>
                                    <td style="vertical-align: middle;">{{$a->nome}}</td>
                                    <td style="vertical-align: middle;">{{$a->rg}}</td>
                                    <td style="vertical-align: middle;">{{$a->escola['nome']}}</td>
                                    @if ($a->pagamento != null)
                                        <td style="vertical-align: middle; color: green; font-size: 30px;"><i class="fa fa-check-square"></td>
                                    @else
                                        <td style="vertical-align: middle;"></td>
                                    @endif
                                    <td style="vertical-align: middle;">
                                        <a class="btn btn-primary" href="{{url('alunos/detalhes/'.$a->id)}}">
                                            <i class="fa fa-eye"></i> Detalhes
                                        </a>
                                        <a class="btn btn-warning" href="{{url('alunos/'.$a->id.'/edit')}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$a->id}}" data-id="{{$a->id}}"> 
                                            <i class="fa fa-times"></i> Excluir
                                        </a>
                                        @include('components.modal_delete', [ 'url' => 'alunos/'.$a->id, 'id' => $a->id])
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
