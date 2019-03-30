<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Solicitud de Horas para examen Psicotécnico</title>
<!--=====================================================================================================================================================================================================================-->
<!--=============================================================BOOTSTRAP4CND=========================================================================================================================================-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--=====================================================================================================================================================================================================================-->

	<link rel="stylesheet" href="css/main.css">
	<script src="../js/validarut.js"></script>
</head>
<body>

		
	<article>
			<div class="container mt-5">

					<section class="cabecera text-center rounded-top ">
							<div class="contact100-form-title  titulo" >

								<h4 class="text-light">
									Solicitud de Horas para Examen Psicotécnico
								</h4>
				
								<h6 class="text-light">
									<br>Ingreso
								</h6>

							</div>

					</section>
					<section class="formulario bg-light text-center p-3 rounded-bottom">
							
							<h4>Para comenzar, necesitamos saber quien eres. </h4>
							<br>
							<form name="form1" id="formu" action="procesa/procesarut.php" method="POST" >
								<div class="form-row cont justify-content-center">
										<div class="form-group text-left">
												<label for="rut" class="">RUT</label>
												<input type="text" class="form-control" name="rut" id="inputRut" onblur="javascript:Rut(document.form1.rut.value)" required>
												<span class="abajito" data-error="wrong" data-success="right">Sin puntos ni guión.</span>

										</div>
										
										
							
								</div>

								<button class="btn btn-outline-info" type="submit" >Continuar</button>
								<br>
               

				<?php include("procesa/imprvalidacion.php"); ?>
				<br>
                <p class="font-italic text-right ">Desarrollado por <a href="" class="text-success">Sergio Sepúlveda</a>.</p>
							</form>
					</section>



			</div>
	</article>

	
</body>
</html>