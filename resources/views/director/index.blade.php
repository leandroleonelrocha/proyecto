
@extends('template')
@section('content-header')

@endsection

@section('content')

	<h1>Listado de directores</h1>
		<div class="box-tools pull-right no-print">
			<a href="{{route('director.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
		</div>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">Documento </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Apellido</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Nombres</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Activo</th>       
        	</thead>
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

@endsection