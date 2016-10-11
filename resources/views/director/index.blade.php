@extends('template')

@section('content')
									<!-- Mensaje -->
	<div class="row">
	@if (session()->has('msg_ok'))
	    <div class="col-xs-10 col-md-offset-1 alert alert-success">
	        <strong>Éxito!</strong><br />
	        {{ session('msg_ok') }}
	    </div>
	@endif
	@if (session()->has('msg_error'))
	    <div class="col-xs-10 col-md-offset-1 alert alert-danger">
	        <strong>Error!</strong><br />
	        {{ session('msg_error') }}
	    </div>
	@endif
	</div>
						
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
					<table class="table dataTable table-bordered table-striped">
						<thead> <tr>
						<th>Nro Documento</th>
						<th>Apellido</th>
						<th>Nombres</th>
						<th>Activo</th>
						<th class="no-print"></th>
						</tr> </thead>
	    				<tbody>
						    @foreach($directores as $d)
							    <tr role="row" class="odd">
							        <td class="sorting_1">{{ $d->nro_documento}}</td>
							        <td>{{ $d->apellidos }}</td>
							        <td>{{ $d->nombres }}</td>
						           	<td>{{ $d->activo}}</td>
						           	<td>
									<a href="{{route('director.edit',$d->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>
						           	<a href="{{route('director.getDelete', $d->id) }}" title="Eliminar"><i class="btn btn-danger glyphicon glyphicon-trash"></i> </a></td>
							    </tr>
						    @endforeach
					   	</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection