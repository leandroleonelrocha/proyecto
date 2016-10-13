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
									<!-- Lista de Personas -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listado de Personas</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('preinformes.add')}}" class="btn btn-success text-white"> Persona Nueva</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table dataTable table-bordered table-striped">
						<thead> <tr>
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Tipo de documento</th>
						<th>N&uacute;mero de documento</th>
						<th class="no-print"></th>
						</tr> </thead>
						<tbody>
						@foreach($personas as $persona)
							<tr>
								<a href="{{route('preinformes.add',$persona->id)}}">
									<td>{{$persona->apellidos}}</td>
									<td>{{$persona->nombres}}</td>
									<td>{{$persona->tipo_documento}}</td>
									<td>{{$persona->nro_documento}}</td>
								</a>
							</tr>
						@endforeach
						</tbody>
					</table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection