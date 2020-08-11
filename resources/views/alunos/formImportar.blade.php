@extends('layouts.main')
@section('title') Novo Aluno @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>  
            <li><a href="{{url('colaboradores')}}"><i class="fa fa-users"></i> Aluno </a></li>
            <li class="active">
                Novo
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_title">
                        <h2>Aluno</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{route('importar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Selecione a escola</label>

                                    <select class="form-control" id="escola" name="escola">
                                        <option>Selecione a escola</option>
                                        @foreach ($escola as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">                       
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <a href="{{url('alunos')}}" class="btn btn-info">
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
