
@extends('template')
@section('content-header')
    <h1>
        Listado de areas.

        <small>Preview page</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Widgets</li>
    </ol>
@endsection

@section('content')

	<h1>Lista alumnos</h1>
  

	@foreach($alumno as $a)
		{{ $a}}
	@endforeach

     {!! Form::open(['route'=>'lenguaje.cambiar', 'method' => 'post']) !!}

          <div class="form-group has-feedback">
          
          <select name="locale">
              <option value="en">English</option>
              <option value="es">Español</option>
              
          </select>
          </div>
       
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Cambiar</button>
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}
    {{ trans('menu.persona') }}

    @lang('menu.persona')



<li><a href="{{ url('lang', ['en']) }}">En</a></li>
<li><a href="{{ url('lang', ['es']) }}">Es</a></li>

@endsection

