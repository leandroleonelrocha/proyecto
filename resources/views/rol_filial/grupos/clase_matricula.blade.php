@extends('template')


@section('content')
								
	<div class="row">
		<div class="col-xs-12">

                    @if(isset($model))
                      {!! Form::model($model,['route'=>['grupos.cargar_clase',$model->id]]) !!}
                    @else
                      {!! Form::open(['route'=>'grupos.cargar_clase']) !!}
                    @endif        

        <div class="box">

                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Grupo:</b>{{ $clase->Grupo->descripcion }}<br>
                  <b>Docente:</b><br>
                  <b>Account:</b> 968-34567
                </div>



                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>{{ $clase->Grupo->descripcion }}</strong><br>
                      {{ $clase->Docente->fullname}}<br>
                      {{ $clase->fecha}}<br>
                    </address>
                  </div>  

                  <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th>#</th>
                      <th>Asistencia</th>
                      <th>Apellido y nombre</th>
                     
                    </tr>
                    
                      @foreach($grupo as $g)
                          <tr>

                              <td ><input type="hidden" name="clase_id" value="{{$clase->id}}"></td>
                            
                              @if(!empty($clase_matricula)) 
                                                       
                                  @foreach($clase_matricula as $mc)
                                
                                  <td> 
                                      <input type='radio' class='flat-red' name='asistio[][{{$g->matricula_id}}]' value="1" {{ $mc->asistio == 1  ? 'checked' : ''  }} >
                                      <input type='radio' class='flat-red' name='asistio[][{{$g->matricula_id}}]' value="0" {{ $mc->asistio == 0  ? 'checked' : ''  }} >
                                  </td>
                                  @endforeach
                              @else
                                  <td> 
                                      <input  class='flat-red'  type="radio"  name='asistio[][{{$g->matricula_id}}]' value="1">
                                      <input  class='flat-red'  type="radio"  name='asistio[][{{$g->matricula_id}}]' value="0">
                                  </td>

                              @endif
                              <td>{{ $g->Matricula->Persona->fullname}}</td>                  
                             
                             
                           </tr>
                          @endforeach 
                    
                  </tbody>
                  </table>
                 
                </div><!-- /.box-body -->

              </div>
                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                {!! Form::close() !!}

</div><!-- /.mail-box-messages -->
</div><!-- /.box-body -->
               
  
@endsection

