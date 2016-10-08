@extends('template')
@section('content-header')
    <h1>
        alta de filiales

    </h1>

@endsection


@section('content')
    @if(isset($model))
        {!! Form::model($model,['route'=>['filiales.postEdit',$model->id]]) !!}
    @else
        {!! Form::open(['route'=>'filiales.postAdd']) !!}
    @endif

    <div class="box-body">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null ,  array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion', 'Direccion') !!}
            {!! Form::text('direccion', null ,  array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('localidad', 'Localidad') !!}
            {!! Form::text('localidad', null ,  array('class'=>'form-control')) !!}
        </div>

      	<div class="form-group">
            {!! Form::label('director', 'Director') !!}
            {!! Form::text('id_director', null ,  array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mail', 'Mail') !!}
            {!! Form::text('mail', null ,  array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('activo', 'Activo') !!}
            {!! Form::text('activo', null ,  array('class'=>'form-control')) !!}
        </div>
       
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar filial</button>
    </div>
    </div><!-- /.box -->
    {!! Form::close() !!}
@endsection