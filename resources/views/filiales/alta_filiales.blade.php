@extends('template')
@section('content-header')
    <h1>
        Alta de filiales
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
            {!! Form::select('id_director', $directores->toArray() , null, array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mail', 'Mail') !!}
            {!! Form::text('mail', null ,  array('class'=>'form-control')) !!}
        </div>

       
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar filial</button>
    </div>
    </div><!-- /.box -->
    {!! Form::close() !!}
@endsection