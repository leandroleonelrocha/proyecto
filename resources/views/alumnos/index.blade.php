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

@endsection

