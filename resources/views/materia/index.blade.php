
@extends('template')
@section('content-header')

@endsection

@section('content')

	<h1>Listado de materias</h1>
		<div class="box-tools pull-right no-print">
			<a href="{{route('materia.nuevo')}}" class="btn btn-success text-white"> Agregar nueva</a>
		</div>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">Nro Materia </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Carrera</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Nombre</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Descripci&oacuten</th>    
        	</thead>
    <tbody>
	    @foreach($materia as $m)
		    <tr role="row" class="odd">

		        <td class="sorting_1">{{ $m->id}}</td>
	          	<td>{{ $m->carrera_id }}</td>
		        <td>{{ $m->nombre }}</td>
	            <td>{{ $m->descripcion }}</td>
	           	<td>
           		<a href="{{route('materia.edit',$m->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>	
	           	<a href="{{route('materia.getDelete', $m->id) }}" title="Eliminar"><i class="btn btn-danger glyphicon glyphicon-trash"></i> </a></td>
				</td>
		    </tr>
	    @endforeach
   	</tbody>
    </table>

@endsection