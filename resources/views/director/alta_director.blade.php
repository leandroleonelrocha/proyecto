@extends('template')
@section('content-header')
    <h1>
        alta de director
    </h1>

@endsection


@section('content')
    @if(isset($model))
        {!! Form::model($model,['route'=>['director.postEdit',$model->id]]) !!}
    @else
        {!! Form::open(['route'=>'director.postAdd']) !!}
    @endif

    <div class="box-body">

        <div class="form-group">
            {!! Form::label('tipoDocumento', 'Tipo Documento') !!}
        <!--    {!! Form::select('id_director', $directores->toArray() , null, array('class'=>'form-control')) !!}-->
        </div>


       <div class="form-group">
            {!! Form::label('documento', 'Nro Documento') !!}
            {!! Form::text('nro_documento', null ,  array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('apellido', 'Apellido') !!}
            {!! Form::text('apellidos', null ,  array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombres', null ,  array('class'=>'form-control')) !!}
        </div>

 

     
       
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar director</button>
    </div>
    </div><!-- /.box -->
    {!! Form::close() !!}
@endsection