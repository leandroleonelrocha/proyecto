@extends('template')
@section('content-header')
    <h1>
        alta de filiales

    </h1>

@endsection


@section('content')
   
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

