@extends('template')

@section('content')
<<<<<<< HEAD
   
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <p>Contraseña: <input type="text" name="contrasena" id="contrasena"/></p>

     <p>Rol: <input type="text" name="rol_id" id="rol_id" /></p>
     <p>Entidad: <input type="text" name="entidad_id" id="entidad_id" /></p>
     <p>Habilitado: <input type="text" name="habilitado" id="habilitado"/></p>
     
     <p><input type="button" id="Button1" value="enviar"/></p>
    
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function(){
       $("#Button1").click(function() {
            alert('asd');
            var token = $("input[name*='_token']").val();
            alert(token);
            $.ajax({
                type: "POST",
                url: 'http://laravelprueba.esy.es/laravel/public/cuenta',
                data:{ password: "1234", rol_id: "1", entidad_id: "2", habilitado: "1" },
                headers:{
                    "X-CSRF-TOKEN": token,
                    
                },
                 success: function(Response){
                   console.log(Response);
                  
                }

            });        
        });
   });
</script>

@endsection

=======
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Nueva Filial</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Form::open(['route'=> 'filiales.postAdd', 'method'=>'post']) !!}
                            <div class="col-md-6 form-group">
                                <label>Nombre</label>
                                {!! Form::text('nombre',null,array('class'=>'form-control')) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Direcci&oacuten</label>
                                {!! Form::text('direccion',null,array('class'=>'form-control')) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Localidad</label>
                                {!! Form::text('localidad',null,array('class'=>'form-control')) !!}
                            </div>

                           <div class="col-md-6 form-group">
                                <label>C&oacute;digo postal</label>
                                {!! Form::text('codigo_postal',null,array('class'=>'form-control')) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Director</label>
                                {!! Form::select('director_id', $directores->toArray() , null, array('class'=>'form-control')) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Mail</label>
                                {!! Form::email('mail',null,array('class'=>'form-control')) !!}
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
>>>>>>> a555ab58d02da73177d5a69ca4bd933a4c9f8c60
