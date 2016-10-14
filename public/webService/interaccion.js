$(document).ready(function(){
   $("#Send").click(function(e) {
        e.preventDefault();
        var usuairo = $('#email').val();
        var password = $('#password').val();
        var token = $("input[name*='_token']").val();
        $.ajax({
            type: "GET",
            url: 'http://laravelprueba.esy.es/laravel/public/cuenta/cuentaLogin',
            data:{ usuario: usuairo, password: password },
            headers:{
                "X-CSRF-TOKEN": token,
            },
             success: function(Response){
               
            }
        });     
    });
});