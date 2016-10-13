@extends('template')

@section('content')
	
						
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Cursos</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('curso.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table dataTable table-bordered table-striped">
						<thead> <tr>
						<th>Nro Curso</th>
						<th>Nombre</th>
						<th>Duraci&oacuten</th>
						<th>Descripci&oacuten</th>
						<th>Taller</th>
						<th class="no-print"></th>
						</tr> </thead>
	    				<tbody>
						    @foreach($curso as $c)
							    <tr role="row" class="odd">

							        <td class="sorting_1">{{ $c->id }}</td>
						        	<input type="hidden" value="{{$c->id_curso}}">
							        <td>{{ $c->nombre }}</td>
							        <td>{{ $c->duracion }}</td>
						            <td>{{ $c->descripcion }}</td>
						           	<td>{{ $c->taller}}</td>

						  			<td>
					           		<a href="{{route('curso.edit',$c->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>		
						  			<a href="{{route('curso.getDelete', $c->id) }}" title="Eliminar"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
							    </tr>
						    @endforeach
					   	</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection
