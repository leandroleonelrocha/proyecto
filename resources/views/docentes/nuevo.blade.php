@extends('template')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Nuevo Docente</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route'=> 'nuevo.postAdd', 'method'=>'post']) !!}
							<div class="col-md-12 form-group">
								<label>N&uacute;mero de Docente</label>
								{!! Form::text('id',null,array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Tipo de Documento</label>
								{!! Form::select('tipo_documento_id',$tipos->toArray(),null,array('class' => 'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Número de Documento</label>
								{!! Form::text('nro_documento',null,array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Apellido</label>
								{!! Form::text('apellidos',null,array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Nombre</label>
								{!! Form::text('nombres',null,array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Descripci&oacute;n</label>
								{!! Form::textarea('descripcion',null,array('class'=>'form-control','size'=>'30x3')) !!}
							</div>

							<div class="col-md-6 form-group">
								<label>filial</label>
						         {!! Form::select('filial_id', $filiales->toArray() , null, array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>Disponibilidad</label>
								<div class="col-xs-12">
									{!! Form::checkbox('disponibilidad_manana', '1') !!} Ma&ntilde;ana
								</div>
								<div class="col-xs-12">
									{!! Form::checkbox('disponibilidad_tarde', '1') !!} Tarde
								</div>
								<div class="col-xs-12">
									{!! Form::checkbox('disponibilidad_noche', '1') !!} Noche
								</div>
							</div>
							<div class="box-footer col-xs-12">
							{!! Form::submit('Crear',array('class'=>'btn btn-success')) !!}
				          	</div>
							{!! Form::close() !!}
						</div>
					</div>
        		</div><!-- Fin box-body -->
			</div> <!-- Fin box -->
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection