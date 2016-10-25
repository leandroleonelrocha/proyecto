@extends('template')

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-3">

				
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Clases</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                   
                   
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Nueva clase</h3>
                </div>
                <div class="box-body">
                  
                  <div class="form-group">
                   
                    {!! Form::select('grupo_id', $grupos, null, ['class' => 'form-control', 'id' => 'grupo_idselected']) !!}
                   
                  </div>

                  <div class="form-group">
                   
                    <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Time picker:</label>
                      <div class="input-group">
                        <input type="text" class="form-control timepicker" >
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
                  
                  </div>

                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Titulo de la clase">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Crear</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
                </div>
              </div>
            </div>


             <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->

	</div>

@endsection

@section('js')

<script src="{{asset('js/calendario/moment.min.js') }}"></script>
<script src="{{asset('js/calendario/jquery.min.js') }}"></script>
<script src="{{asset('js/calendario/jquery-ui.min.js') }}"></script>
<script src="{{asset('js/calendario/fullcalendar.min.js') }}"></script>
<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('js/functions/funcionCalendario.js') }} "> </script>

@endsection