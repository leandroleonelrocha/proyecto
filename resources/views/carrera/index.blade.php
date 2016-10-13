@extends('template')

@section('content')
	
								
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Carreras</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('carrera.nuevo')}}" class="btn btn-success text-white"> Agregar nueva</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table dataTable table-bordered table-striped">
						<thead> <tr>
						<th>Nro Carrera</th>
						<th>Nombre</th>
						<th>Duraci&oacuten</th>
						<th>Descripci&oacuten</th>
						<th class="no-print"></th>
						</tr> </thead>
						<tbody>
					    	@foreach($carrera as $ca)
						    	<tr role="row" class="odd">

						        	<td class="sorting_1">{{ $ca->id }}</td>
						        	<input type="hidden" value="{{$ca->id_carrera}}">
							        <td>{{ $ca->nombre }}</td>
							        <td>{{ $ca->duracion }}</td>
						            <td>{{ $ca->descripcion }}</td>
						           	<td>
					      			<a href="{{route('carrera.edit',$ca->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>	
						           	<a href="{{route('carrera.getDelete', $ca->id) }}" title="Eliminar"><i class="btn btn-danger glyphicon glyphicon-trash"></i> </a></td>
									</td>
							    </tr>
						    @endforeach
				   		</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection