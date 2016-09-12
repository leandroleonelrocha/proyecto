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

	@foreach($alumno as $a)
		{{ $a }} '<br>'
	@endforeach()

</body>
</html>