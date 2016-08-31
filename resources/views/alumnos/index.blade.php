<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	{!! Form::open() !!}
	{!! Form::close() !!}
	@foreach($alumno as $a)
		{{ $a }} '<br>'
	@endforeach()

</body>
</html>