
@extends('template')
@section('content-header')
    <h1>
        Listado de Filiares.

        <small>Preview page</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Widgets</li>
    </ol>
@endsection

@section('content')

	<h1>Lista filiales</h1>

 	<a href="{{route('filiales.nuevo')}}" class="btn btn-block btn-default" >Agregar  Filial</a>

 	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		 	<thead>
	    		<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">Nombre </th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Direccion</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Localidad</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Director</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Mail</th>
		        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">Activo</th>       
        	</thead>
    <tbody>
	    @foreach($filiales as $f)
		    <tr role="row" class="odd">

		        <td class="sorting_1">{{ $f->nombre }}</td>
		        <td>{{ $f->direccion }}</td>
		        <td>{{ $f->localidad }}</td>
	            <td>{{ $f->id_director }}</td>
		        <td>{{ $f->mail}}</td>
	           	<td>{{ $f->activo}}</td>
		    </tr>
	    @endforeach
   	</tbody>
    </table>

@endsection
