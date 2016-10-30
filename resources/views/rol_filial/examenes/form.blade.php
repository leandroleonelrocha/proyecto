@extends('template')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Nuevo Examen</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
						@if(isset($model))
					        {!! Form::model($model,['route'=>['filial.examenes_editar_post',$model->nro_acta]]) !!}
					    @else
					        {!! Form::open(['route'=>'filial.examenes_nuevo_post']) !!}
					    @endif

							
							<div class="col-md-6 form-group">
								<label>N&uacute;mero de Acta</label>
								{!! Form::text('nro_acta',null,array('class'=>'form-control')) !!}
							</div>
							<div class="col-md-6 form-group">
								<label>N&uacute;mero de Recuperatorio</label>
								{!! Form::text('recuperatorio_nro_acta',null,array('class'=>'form-control')) !!}
							</div>
							
							<div class="col-md-6 form-group">
								<label>Matricula</label>
								{!! Form::select('matricula_id',$matriculas->toArray(),null,array('class' => 'form-control')) !!}
							</div>

							<div class="col-md-6 form-group">
								<label>Grupo</label>
								{!! Form::select('grupo_id',$grupos->toArray(),null,array('class' => 'form-control')) !!}
							</div>

							<div class="col-md-6 form-group">
								<label>Nota</label>
							
								<input type="number" name="nota" min="1" max="10" class="form-control">
							</div>


							<div class="col-md-6 form-group">
								<label>Carrera</label>
								{!! Form::select('carrera_id',$carreras->toArray(),null,array('class' => 'form-control')) !!}
							</div>
							
							<div class="col-md-6 form-group">
								<label>Materia</label>
								{!! Form::select('materia_id',$materias->toArray(),null,array('class' => 'form-control')) !!}
							</div>

							<div class="col-md-6 form-group">
								<label>Docente</label>
								{!! Form::select('docente_id',$docentes->toArray(),null,array('class' => 'form-control')) !!}
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

