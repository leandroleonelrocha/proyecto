@extends('template')

@section('content')

	<!-- Lista de Docentes -->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Docentes</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('docentes.add')}}" class="btn btn-success text-white"> Agregar nuevo</a>
					</div>
				</div>
				<div class="box-body">
					 <table id="example1" class="table table-bordered table-striped">
						<thead> <tr>
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Tipo de Documento</th>
						<th>Documento</th>
						<th class="no-print"></th>
						</tr> </thead>
						<tbody>
						@foreach($docentes as $docente)
							<tr>
									<td>
										<input type="hidden" value="{{$docente->id}}">
										{{$docente->apellidos}}
									</td>
									<td>{{$docente->nombres}}</td>
									<td>{{$docente->TipoDocumento->tipo_documento}}</td>
									<td>{{$docente->nro_documento}}</td>
									<td>
									<a href="{{route('docentes.edit',$docente->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>
									<a href="{{route('docentes.delete',$docente->id)}}" title="Borrar" onclick="return confirm('¿Está seguro que desea eliminar al docente?);"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection