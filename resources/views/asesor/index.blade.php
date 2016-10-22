@extends('template')

@section('content')
		
						
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Asesores</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('asesor.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
					</div>
				</div>
				<div class="box-body">
					 <table id="example1" class="table table-bordered table-striped">
						<thead> <tr>
						<th>Tipo de Documento</th>
						<th>Documento</th>
						<th>Apellido</th>
						<th>Nombres</th>
						<th>Direcci&oacuten</th>
						<th>Localidad</th>
			
			
						<th class="no-print"></th>
						</tr> </thead>
	    				<tbody>
						    @foreach($asesor as $a)
							    <tr role="row" class="odd">
						    		<td>{{$a->TipoDocumento->tipo_documento}}</td>
							      	<td>{{ $a->nro_documento}}</td>
							        <td>{{ $a->apellidos }}</td>
							        <td>{{ $a->nombres }}</td>
						          	<td>{{ $a->direccion }}</td>
						            <td>{{ $a->localidad }}</td>
					

						           	<td>
									<a href="{{route('asesor.edit',$a->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>
						           	<a href="{{route('asesor.getDelete',$a->id)}}" title="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar el director?);"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
							    </tr>
						    @endforeach
					   	</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection