<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	{!! Form::open(array('route'=>'s')) !!}
	{!! Form::text('email',null,array("placeholder" =>'example@gmail.com' ))!!}

	{!!Form::submit('Click Me!')!!}
	{!! Form::close() !!}

=======
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
>>>>>>> 09b0eb1467e0070eeafe40e51637b070b4c182bb
	@foreach($alumno as $a)
		{{ $a}}
	@endforeach

@endsection

