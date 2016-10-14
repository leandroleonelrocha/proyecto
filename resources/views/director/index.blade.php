@extends('template')

@section('content')
		
						
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Directores</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('director.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
					</div>
				</div>
				<div class="box-body">
					 <table id="example1" class="table table-bordered table-striped">
						<thead> <tr>
		
						<th>Nro Documento</th>
						<th>Apellido</th>
						<th>Nombres</th>
						<th class="no-print"></th>
						</tr> </thead>
	    				<tbody>
						    @foreach($directores as $d)
							    <tr role="row" class="odd">
							      	<td>{{ $d->nro_documento}}</td>
							        <td>{{ $d->apellidos }}</td>
							        <td>{{ $d->nombres }}</td>
						           	<td>
									<a href="{{route('director.edit',$d->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>
						           	<a href="{{route('director.getDelete',$d->id)}}" title="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar el director?);"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
							    </tr>
						    @endforeach
					   	</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection