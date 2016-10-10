
@extends('template')
@section('content-header')

@endsection

@section('content')

	<h1>Listado de cursos</h1>
		<div class="box-tools pull-right no-print">
			<a href="{{route('curso.nuevo')}}" class="btn btn-success text-white"> Agregar nuevo</a>
		</div>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">N&uacute;mero </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nombre</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Duraci&oacuten</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Descripci&oacuten</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">Taller</th>     
        	</thead>
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

@endsection
