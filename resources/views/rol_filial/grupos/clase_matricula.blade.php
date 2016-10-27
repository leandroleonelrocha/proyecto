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
                    
                        @if(isset($model))
                            {!! Form::model($model,['route'=>['grupos.cargar_clase',$model->id]]) !!}
                        @else
                            {!! Form::open(['route'=>'grupos.cargar_clase']) !!}
                        @endif  
                    <table class="table table-hover table-striped">
                      <tbody>
                       
                         @foreach($grupo as $g)
                          <tr>
                              <td ><input type="hidden" name="clase_id" value="{{$clase->id}}"></td>
                              @if(count($g->Matricula->Clase) > 0 ) 

                                  @foreach($g->Matricula->Clase as $mc)
                                 
                                  <td> 
                                  <input type='radio' name='asistio[][{{$g->matricula_id}}]' value="1" {{ $mc->pivot->asistio == 1  ? 'checked' : ''  }} >
                                  <input type='radio' name='asistio[][{{$g->matricula_id}}]' value="0" {{ $mc->pivot->asistio == 0  ? 'checked' : ''  }} >
 
                                  </td>
                                  @endforeach

                              @else
                                  <td> 
                                  
                                      <input id="exampleRadioSwitch11" type="radio"  name='asistio[][{{$g->matricula_id}}]' value="1">
                                      <input id="exampleRadioSwitch11" type="radio"  name='asistio[][{{$g->matricula_id}}]' value="0">
                                  </td>

                              @endif
                           
                             

                              <td class="mailbox-name">{{ $g->Matricula->Persona->fullname}}</td>                  
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">15 days ago</td>
                           </tr>
                          @endforeach 
                    
                      </tbody>
                    </table><!-- /.table -->

                       <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                       {!! Form::close() !!}


                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
               
           
		</div> <!-- Fin col -->
	</div> <!-- Fin row -->
@endsection

@section('js')

@endsection