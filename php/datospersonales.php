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
									<br>Datos Personales
								</h6>

							</div>

					</section>
					<section class="formulario bg-light text-center p-3 rounded-bottom">
					<h3 class=""><b>Datos Personales</b></h3>
					<br>
							<h5 class="text-secondary">Necesitamos tus datos para realizar la solicitud.</h5>
							<br>
							<form name="form1" id="formu" action="procesa/procesadatospersonales.php" method="POST" >
<!-- SEPARADOR ---Nombre-->
								
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-5">
												<label for="ingresonombre" class="text-info">Nombre</label>
                                                <input type="text" name="ingresonombre" class="form-control"  required="" autofocus
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['nombre_obtenido']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Un nombre es suficiente</small>
                                        </div>        
                                </div>
<!-- SEPARADOR ---Apellido Paterno-->
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-5">
												<label for="ingresapellidop" class="text-info">Apellido Paterno</label>
                                                <input type="text" name="ingresapellidop" class="form-control"  required="" 
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['apellidop_obtenido']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Primer apellido</small>
                                        </div>        
                                </div>
<!-- SEPARADOR ---Apellido Materno-->
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-5">
												<label for="ingresapellidom" class="text-info">Apellido Materno</label>
                                                <input type="text" name="ingresapellidom" class="form-control"  required="" 
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['apellidom_obtenido']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Segundo apellido</small>
                                        </div>        
                                </div>
<!-- SEPARADOR ---Fecha de Nacimiento-->
								<div class="form-row cont justify-content-center">
									<div class="form-group text-left col-md-5">
											<label for="fechanacimiento" class="text-info">Fecha de Nacimiento</label>
											<input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" min="1919-01-01" required value="
											<?php if ($_SESSION['encontrado']) {
												echo utf8_encode($_SESSION['fechanac_obtenido']);
											}?>">
											<small class="text-secondary" data-error="wrong" data-success="right">Ingresa tu fecha de Nacimiento</small>
									</div>
								</div>
<!-- SEPARADOR ---Sexo -->													
								<div class="cont col-md-5">

									<div class="form-group text-left">
											<label  class="text-info text-left">Sexo</label>
									</div>

									<div class="form-row justify-content-between">
											<div class="custom-control custom-radio">
													<input type="radio" id="customRadio1" name="sexo" class="custom-control-input" value="Femenino"
													<?php if ($_SESSION['encontrado']) {
														if($_SESSION['sexo_obtenido']=='Femenino'){
																echo 'checked';
														}
														
														}?>
														>
													<label class="custom-control-label" for="customRadio1">Femenino</label>
											</div>
											<div class="custom-control custom-radio">
													<input type="radio" id="customRadio2" name="sexo" class="custom-control-input" value="Masculino"
													<?php if ($_SESSION['encontrado']) {
														if($_SESSION['sexo_obtenido']=='Masculino'){
																echo 'checked';
														}
														
														}?>
														>
													<label class="custom-control-label" for="customRadio2">Masculino</label>
											</div>
											<div class="custom-control custom-radio">
													<input type="radio" id="customRadio3" name="sexo" class="custom-control-input" value="No Especifica"
													<?php if ($_SESSION['encontrado']) {
														if($_SESSION['sexo_obtenido']=='Otro'){
																echo 'checked';
														}
														
														}?>
														>
													<label class="custom-control-label" for="customRadio3">Otro</label>
											</div>
									</div>

								</div>

<!-- SEPARADOR CONTACTO -->

								<br>
								<h3 class=""><b>Datos de Contacto</b></h3>
								<br>

<!-- SEPARADOR ---Correo -->
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-5">
												<label for="email" class="text-info">Correo Electronico</label>
                                                <input type="email" name="email" id="email" class="form-control"  required="" value=" <?php if ($_SESSION['encontrado']) {
													echo utf8_encode($_SESSION['correo_obtenido']);
													}?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Su dirección de correo podría ser algo así:  sunombre@gmail.com</small>
                                        </div>        
								</div>
								
<!-- SEPARADOR ---Telefono -->
								<div class="form-row cont justify-content-center">    
										<div class="form-group text-left col-md-5">
												<label for="telefono" class="text-info">Teléfono </label>
												<input type="tel" name="telefono" id="telefono" class="form-control"  required=""   value="<?php if ($_SESSION['encontrado']) {
													echo $_SESSION['telefono_obtenido'];
													}else{
															echo '+56';   
													}?>" >
												
												<small class="text-secondary" data-error="wrong" data-success="right">Su numero de teléfono Celular</small>
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