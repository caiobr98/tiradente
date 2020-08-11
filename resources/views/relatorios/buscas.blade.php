@extends('layouts.main')
@section('title') Relatório de Buscas @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                Relatório de Buscas
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Relatório de Buscas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12">
                            <form class="row" method="GET">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_inicial">Data Inicial</label>
                                        <input name="data_inicial" class="form-control" type="date" id="data_inicial"
                                        @isset($_GET['data_inicial']) value="{{$_GET['data_inicial']}}" @endisset>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_final">Data Final</label>
                                        <input name="data_final" class="form-control" type="date" id="data_final"
                                        @isset($_GET['data_final']) value="{{$_GET['data_final']}}" @endisset>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="gerar">...</label>
                                        <button type="submit" id="gerar" class="form-control btn btn-success">Gerar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('parts.messages')
                        <div class="col-md-12">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Busca</th>
                                        <th>Usuário</th>
                                        <th>Data</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($buscas as $b)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$b->id}}</td>
                                            <td style="vertical-align: middle;">{{$b->busca}}</td>
                                            <td style="vertical-align: middle;">{{$b->userApp->name}}</td>
                                            <td style="vertical-align: middle;">{{$b->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
