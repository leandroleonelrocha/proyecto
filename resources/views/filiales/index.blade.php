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
					<h3 class="box-title">Listado de filiales</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('filiales.nuevo')}}" class="btn btn-success text-white"> Agregar nueva</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table dataTable table-bordered table-striped">
						<thead> <tr>
						<th>Nombre</th>
						<th>Direcci&oacuten</th>
						<th>Localidad</th>
						<th>CP</th>
						<th>Director</th>
						<th>Mail</th>
						<th class="no-print"></th>
						</tr> </thead>
	    				<tbody>
						    @foreach($filiales as $f)
						    {{ dd($f->NombreDirector)}}
							    <tr role="row" class="odd">
							        <td class="sorting_1">{{ $f->nombre }}</td>
							        <td>{{ $f->direccion }}</td>
							        <td>{{ $f->localidad }}</td>
					                <td>{{ $f->codigo_postal }}</td>
						            <td>{{ $f->NombreDirector}}</td>
							        <td>{{ $f->mail}}</td>
						           	<td>
					           		<a href="{{route('filiales.edit',$f->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>	
				           	   		<a href="{{route('filiales.getDelete',$f->id)}}" title="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar la filial?);"><i class="btn btn-danger glyphicon glyphicon-trash"></i></a></td>
							    </tr>
						    @endforeach
					   	</tbody>
				    </table>
		
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->			    
@endsection
