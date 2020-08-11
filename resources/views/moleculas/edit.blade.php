@extends('layouts.main')
@section('title') Moléculas @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"> Home </a></li>
            <li><a href="{{url('moleculas')}}"> / Moléculas </a></li>
            <li class="active">
                / Editar
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Moléculas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form class="row" action="{{url('moleculas/'.$molecula->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="laboratorio">Laboratório</label>
                                    <input name="laboratorio" class="form-control" type="text" id="laboratorio" value="{{$molecula->laboratorio}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="molecula">Molécula</label>
                                    <input name="molecula" class="form-control" type="text" id="molecula" value="{{$molecula->molecula}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apresentacao">Apresentação</label>
                                    <input name="apresentacao" class="form-control" type="text" id="apresentacao" value="{{$molecula->apresentacao}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="particularidades">Particularidades</label>
                                    <textarea name="particularidades" class="form-control" id="particularidades" rows="5">{{$molecula->particularidades}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="via_administracao">Via de Administração</label>
                                    <input name="via_administracao" class="form-control" type="text" id="via_administracao" value="{{$molecula->via_administracao}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="forma_farmaceutica">Forma Farmacêutica</label>
                                    <input name="forma_farmaceutica" class="form-control" type="text" id="forma_farmaceutica" value="{{$molecula->forma_farmaceutica}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempo_administracao">Tempo de Administração</label>
                                    <input name="tempo_administracao" class="form-control" type="text" id="tempo_administracao" value="{{$molecula->tempo_administracao}}">
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #fcffd1">
                                <div class="form-group">
                                    <label>Reconstituição</label>
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #fcffd1">
                                <div class="form-group">
                                    <label for="reconstituinte">Reconstituinte</label>
                                    <input name="reconstituinte" class="form-control" type="text" id="reconstituinte" value="{{$molecula->reconstituinte}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #fcffd1">
                                <div class="form-group">
                                    <label for="reconstituicao_concentracao">Concentração</label>
                                    <input name="reconstituicao_concentracao" class="form-control" type="text" id="reconstituicao_concentracao" value="{{$molecula->reconstituicao_concentracao}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #fcffd1">
                                <div class="form-group">
                                    <label for="estabilidade_apos_constituicao">Estabilidade Após Constituição</label>
                                    <input name="estabilidade_apos_constituicao" class="form-control" type="text" id="estabilidade_apos_constituicao" value="{{$molecula->estabilidade_apos_constituicao}}">
                                </div>
                            </div>

                            <div class="col-md-12" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label>Diluição</label>
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label for="diluente">Diluente</label>
                                    <input name="diluente" class="form-control" type="text" id="diluente" value="{{$molecula->diluente}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input name="volume" class="form-control" type="text" id="volume" value="{{$molecula->volume}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label for="diluicao_concentracao">Concentração</label>
                                    <input name="diluicao_concentracao" class="form-control" type="text" id="diluicao_concentracao" value="{{$molecula->diluicao_concentracao}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label for="estabilidade_apos_diluicao">Estabilidade Após Diluição</label>
                                    <input name="estabilidade_apos_diluicao" class="form-control" type="text" id="estabilidade_apos_diluicao" value="{{$molecula->estabilidade_apos_diluicao}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="background-color: #ffe9e9">
                                <div class="form-group">
                                    <label for="proteger_luz">Proteger da Luz</label>
                                    <input name="proteger_luz" class="form-control" type="text" id="proteger_luz" value="{{$molecula->proteger_luz}}">
                                </div>
                            </div>

                            <div class="col-md-12">

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="referencias">Referências</label>
                                    <input name="referencias" class="form-control" type="text" id="referencias" value="{{$molecula->referencias}}">
                                </div>
                            </div>

                            <div class="col-md-12">

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bula">Bula</label>
                                    <textarea rows="5" name="bula" class="form-control" id="bula">{{$molecula->bula}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{url('moleculas')}}" class="btn btn-info">
                                    Voltar
                                </a>
                                <input type="hidden" value="{{$molecula->id}}" name="id">
                                <button id="btnEditar" type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
