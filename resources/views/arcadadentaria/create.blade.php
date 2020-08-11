@extends('admin.default')

@section('page-header')
	Adicionar ... <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['Arcadadentaria\ArcadadentariaController@store'],
			'files' => false
		])
	!!}

		

		@include('admin.arcadadentaria.form')

		<a href="{{ url('admin/arcadadentaria') }}"  class="btn btn-info">voltar</a>
		<button type="submit" class="btn btn-primary">Adicionar</button>
		
	{!! Form::close() !!}
	
@stop
