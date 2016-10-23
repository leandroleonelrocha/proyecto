@extends('template')

@section('content')
									<!-- Lista de Personas -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Personas</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('persona.nuevo')}}" class="btn btn-success text-white"> Agregar nueva Persona</a>
					</div>
				</div>

				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead><tr>
						<th>Documento</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha de nac</th>
						<th>domicilio</th>
						<th>Localidad</th>
						<th>Tel&eacute;fono</th>
						<th>E-mail</th>
						<th>Estado civil</th>
						<th>Nivel de estudios</th>
						<th class="no-print"></th>
						</tr></thead>
						<tbody>
							@foreach($persona as $p)
								<tr>
									<td>{{$p->nro_documento}}</td>
									<td>{{$p->nombres}}</td>
									<td>{{$p->apellidos}}</td>
									<td>{{$p->fecha_nacimiento}}</td>
									<td>{{$p->domicilio}}</td>
									<td>{{$p->localidad}}</td>
							     	@foreach($a->PersonaTelefono as $telefono)
						            		{{$telefono->telefono}}
					            	@endforeach
				            	   	@foreach($a->PersonaMail as $mail)
						            		{{$mail->mail}}
					            	@endforeach
									<td>{{$p->estado_civil}}</td>
									<td>{{$p->nivel_estudios}}</td>

						          	<td>
									<a href="{{route('persona.edit',$p->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>
						           	<a href="{{route('persona.getDelete',$p->id)}}" title="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar  la persona?);"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>	
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection