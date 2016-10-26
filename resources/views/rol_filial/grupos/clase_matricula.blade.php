@extends('template')


@section('content')
	
								
	<div class="row">
		<div class="col-xs-12">
		
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $clase->Grupo->descripcion }}, {{ $clase->Docente->fullname}}, {{ $clase->fecha}}</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                        
                      
                        @if(isset($model))
                            {!! Form::model($model,['route'=>['grupos.cargar_clase',$model->id]]) !!}
                        @else
                            {!! Form::open(['route'=>'grupos.cargar_clase']) !!}
                        @endif  

                         @foreach($grupo as $g)
                          <tr>
                         
                              
                              <td> <input type='checkbox' name='asistio[];matricula_id[]' value='1;{{ $g->matricula_id}}'>1<br></td>

                              <td ><input type="hidden" name="clase_id" value="{{$clase->id}}"></td>
                              <td class="mailbox-name">{{ $g->Matricula->Persona->fullname}}</td>                  
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">15 days ago</td>
                           </tr>
                          @endforeach 

                            <button type="submit" class="btn btn-primary">Guardar</button>
                       {!! Form::close() !!}

                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
               
           
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection

@section('js')

@endsection