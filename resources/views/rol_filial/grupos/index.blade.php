@extends('template')


@section('content')
	
								
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listao de grupos</h3>
					<div class="box-tools pull-right no-print">
						<a href="{{route('grupos.nuevo')}}" class="btn btn-success text-white"> Nuevo grupo</a>
					</div>
				</div>
				<div class="box-body">
					 <table id="example1" class="table table-bordered table-striped">
						<thead> <tr>
						<th>@lang('carrera.numero')</th>
						<th>@lang('carrera.nombre')</th>
						<th>@lang('carrera.duracion')</th>
						<th>@lang('carrera.descripcion')</th>
						<th class="no-print"></th>
						</tr> </thead>
						<tbody>
						@foreach($grupos as $grupo)
						<td>{{ $grupo->curso_id }}</td>
						<td>{{ $grupo->carrera_id }}</td>
						<td>{{ $grupo->materia_id }}</td>
						<td>{{ $grupo->descripcion }}</td>
						<td>{{ $grupo->docente_id }}</td>						
						@endforeach
					    	
				   		</tbody>
				    </table>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection

 