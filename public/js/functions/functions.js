$(document).ready(function(){
	// Se Corrobora que no se haya seleccionado ninguna Carrera o Curso
	function seleccionoCarreraCurso(){
		var seleccionCarrera, seleccionCurso;
		$('#carreras').each(function(){ // Se recorre todo el select
			if ( $(this).val() != null )
				seleccionCarrera = true;
			else 
				seleccionCarrera = false;
		});
		$('#cursos').each(function(){
			if ( $(this).val() != null ) 
				seleccionCurso = true;
			else 
				seleccionCurso = false;
		});

		if (seleccionCarrera == true || seleccionCurso == true) // Si hay alguno seleccionado
			$('#ninguna').attr('disabled',true);
		else 
			$('#ninguna').removeAttr('disabled');
	}

	// Se bloquea/habilita la opción ninguna
	seleccionoCarreraCurso(); // Al cargar la página
	// Al hacer click en alguna Carrera o Curso
	$('#carreras').click(function(){ seleccionoCarreraCurso(); });
	$('#cursos').click(function(){ seleccionoCarreraCurso(); });

	// Permite agregar 'Otros' en Intereses -- Seccion de Preinformes
   $('#ninguna').click(function(){
        if( $('#ninguna').prop('checked') ) {
		    $('#otros').removeAttr('disabled');
		}
		else
			$('#otros').attr('disabled',true);
    });
});