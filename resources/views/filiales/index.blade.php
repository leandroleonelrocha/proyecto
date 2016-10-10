
@extends('template')
@section('content-header')

@endsection

@section('content')

	<h1>Listado de filiales</h1>
		<div class="box-tools pull-right no-print">
			<a href="{{route('filiales.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
		</div>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 160px;">Nombre </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Direcci&oacuten</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Localidad</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">Director</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Mail</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">Activo</th>       
        	</thead>
    <tbody>
	    @foreach($filiales as $f)
		    <tr role="row" class="odd">

		        <td class="sorting_1">{{ $f->nombre }}</td>
		        <td>{{ $f->direccion }}</td>
		        <td>{{ $f->localidad }}</td>
	            <td>{{ $f->director_id }}</td>
		        <td>{{ $f->mail}}</td>
	           	<td>{{ $f->activo}}</td>
	           	<td>
           		<a href="{{route('filiales.edit',$f->id)}}" title="Editar"><i class="btn btn-success glyphicon glyphicon-pencil"></i></a>	
	           	<a href="{{route('filiales.getDelete', $f->id) }}" title="Eliminar"><i class="btn btn-danger glyphicon glyphicon-trash"></i> </a></td>
		    </tr>
	    @endforeach
   	</tbody>
    </table>

@endsection
