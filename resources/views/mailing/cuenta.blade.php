<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GeCo -- Nueva Cuenta</title>
	<!-- <style>
		.mailContainer {
		    background-color: #1e961e;
		    margin: 0 auto;
		    padding: 2%;
		    width: 80%;
		}

		.verde{ color: #1e961e; }

		.box {
		    background-color: #fff;
		    border-radius: 5px;
		    margin: 2% auto;
		    padding: 2%;
		    width: 80%;
		}

		.title {
		    font-size: 25px;
		    text-align: center;
		}
	</style> -->
</head>
<body>
	<div class="mailContainer">
		<div class="box title">
			<strong>{!!$filial!!}</strong> Bienvenido a GE<span class="verde">CO</span>
		</div>
		<div class="box">
			<p>Se le ha asignado una cuenta para el sistema de gesti&oacute;n y cobranza Geco.</p>
			<p>Para comenzar dir&iacute;jase a nuestro sitio web haciendo click aqu&iacute;.</p>
		</div>
		<div class="box">
			<div class="title verde">Datos de la Cuenta</div>
			<p><strong>Usuario: </strong>{!!$user!!}</p>
			<p><strong>Contrase&ntilde;a: </strong>{!!$password!!}</p>
		</div>
	</div>
</body>
</html>