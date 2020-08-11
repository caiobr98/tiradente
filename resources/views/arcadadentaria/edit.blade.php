@extends('admin.default')

@section('page-header')
	Editar ... <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($user, [
			'action' => ['Arcadadentaria\ArcadadentariaController@update', $user->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.arcadadentaria.form')

		<a href="{{ url('admin/arcadadentaria') }}"  class="btn btn-info">voltar</a>
		<button type="submit" class="btn btn-primary">Editar</button>

	{!! Form::close() !!}

@stop
