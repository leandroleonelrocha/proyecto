
@extends('template')
@section('content-header')

@endsection

@section('content')

	<h1>Listado de carreras</h1>
		<div class="box-tools pull-right no-print">
			<a href="{{route('carrera.nuevo')}}" class="btn btn-success text-white"> Agregar nueva</a>
		</div>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">N&uacute;mero </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nombre</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Duraci&oacuten</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">Descripci&oacuten</th>    
        	</thead>
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

@endsection