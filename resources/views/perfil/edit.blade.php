@extends('layouts.main')
@section('title') Meu Perfil @endsection
@section('content')
    <div class="">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
            <li class="active">
                Meu Perfil
            </li>
        </ol>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Meu Perfil</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @include('parts.messages')
                        <form method="POST" action="{{url('perfil/'.$usuario->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="row">
                                <div class="col-md-2">
                                    <div style="margin-bottom: 10px;">
                                        <img src="@if($usuario->imagem) {{App\Helpers::storage($usuario->imagem)}} @else {{asset('images/user.png')}} @endif" alt="" class="img-responsive" style="margin: 0 auto; width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <input name="imagem" type="file" id="imagem">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="name" value="{{$usuario->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$usuario->email}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirmação Senha</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" value="{{$usuario->id}}" name="id">
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
