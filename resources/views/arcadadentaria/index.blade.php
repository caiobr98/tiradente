@extends('layouts.main')

@section('page-header')
    Listagem de .. 
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route('arcadadentaria.create') }}" class="btn btn-info">
            Criar
        </a>
    </div>

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Data da consulta</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Data da consulta</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route('arcadadentaria.edit', $item->user_id) }}">{{ $item->name }}</a></td>
                        <td>{{ \App\Utils::formatDateTimeToView($item->created_at) }}</td>
                        <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <form action="{{route('arcadadentaria.edit', $item->user_id)}}" class="edit" method="get">
                                            <input type="hidden" name="arcadadentarias_created_at" value="{{ \App\Utils::formatDateTimeToView($item->created_at, 'Y-m-d') }}">
                                            <button class="btn btn-primary btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-pencil"></i></button>
                                        </form>
                                    </li>
                                
                                <li class="list-inline-item">
                                
                                    {{-- {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route('arcadadentaria.destroy', $item->user_id), 
                                        'method' => 'DELETE',
                                        ]) 
                                    !!} --}}

                                        <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                        
                                    {{-- {!! Form::close() !!} --}}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>

@endsection