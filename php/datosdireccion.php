<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();

if (!$_SESSION['id_persona']) {
        header('location:ingresorut.php');
}

// Consulta de regiones (no se ve en front)
$listarregiones = "SELECT id_region, nombre_region FROM ta_region ORDER BY nombre_region ASC";

$sentencia_listarreg = $conn->prepare($listarregiones);   // Preparamos la consulta a la base de datos
$sentencia_listarreg->execute();                          // Ejecutamos la consulta
$resultado_listarreg = $sentencia_listarreg->fetchAll();  //Obtenemos los datos

// Consulta de comunas (carga select)

$listarcomunas = "SELECT id_comuna, nombre_comuna FROM ta_comuna WHERE fk_id_region = ?";
$rm=16;
$sentencia_listacomunas = $conn->prepare($listarcomunas);// Preparamos la consulta a la base de datos
$sentencia_listacomunas->execute(array($rm));            // Ejecutamos la consulta
$resultado_listacomuna = $sentencia_listacomunas->fetchAll(); //Obtenemos los datos

//consulta por direccion

$selectdireccion = "SELECT * FROM ta_direccion WHERE fk_id_persona = ?";

$sentencia_buscardireccion = $conn->prepare($selectdireccion);// Preparamos la consulta a la base de datos
$sentencia_buscardireccion->execute(array($_SESSION['id_persona']));            // Ejecutamos la consulta
$resultado_buscardireccion = $sentencia_buscardireccion->fetchAll(); //Obtenemos los datos



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
									<br>Residentes
								</h6>

							</div>

					</section>
					<section class="formulario bg-light text-center p-3 rounded-bottom">
							<h3 class=""><b>Datos de Residencia </b></h3>
							<br>
							<h5 class="text-secondary">Recuerda que SOLO residentes de la comuna pueden utilizar este servicio	. </h5>
							<br>
							<form name="form1" id="formu" action="procesa/procesadatosdireccion.php" method="POST" >

								<div class="form-row cont justify-content-center">
										<div class="form-group text-left col-md-6">
												<label for="comunas" class="text-info">Comuna</label>
												<select class="custom-select" name="comunas" id="comunas" required="">
                                                    	 <option value="0">Selecciona una Comuna</option>
                                                    	 <?php foreach($resultado_listacomuna as $nombrecomuna): ?>
                                                         <option class="text-dark" value="<?php echo $nombrecomuna['id_comuna'];?>" <?php if ($nombrecomuna['nombre_comuna'] == 'Padre Hurtado') {
                                                        	   echo ' selected';
                                                        } ?> ><?php echo utf8_encode($nombrecomuna['nombre_comuna']);?></option>     
                                                        <?php endforeach?>
                                                                                                
												</select>
												<small class="text-secondary" data-error="wrong" data-success="right">Deberás acreditar domicilio.</small>

										</div>				
								</div>
<!-- Separador de campos -->	
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-6">
												<label for="calle" class="text-info">Calle o Pasaje</label>
                                                <input type="text" name="calle" class="form-control"  required="" 
                                                value="<?php if ($resultado_buscardireccion) {
                                                        echo utf8_encode($resultado_buscardireccion['calle_dir']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Ingrese el nombre de la calle en donde vive</small>
                                        </div>        
								</div>
<!-- Separador de campos -->	
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-6">
												<label for="numero" class="text-info">Numeración</label>
                                                <input type="text" name="numero" class="form-control"  required="" 
                                                value="<?php if ($resultado_buscardireccion) {
                                                        echo utf8_encode($resultado_buscardireccion['numero_dir']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Numero de casa o de departamento.</small>
                                        </div>        
								</div>		
<!-- Separador de campos -->	
								<div class="form-row cont justify-content-center">    
                                        <div class="form-group text-left col-md-6">
												<label for="otro" class="text-info">Otro</label>
                                                <input type="text" name="otro" class="form-control"  
                                                value="<?php if ($resultado_buscardireccion) {
                                                        echo utf8_encode($resultado_buscardireccion['dpto_dir']);
                                                }?>" >
                                                
                                                <small class="text-secondary" data-error="wrong" data-success="right">Casa, block u otra numeración adicional.</small>
                                        </div>        
								</div>						


								<button class="btn btn-outline-info" type="submit" >Continuar</button>
								<br>
               

                <?php include("procesa/imprvalidacion.php"); ?>
                <p class="font-italic text-right ">Desarrollado por <a href="" class="text-success">Sergio Sepúlveda</a>.</p>
							</form>
					</section>



			</div>
	</article>

	
</body>
</html>
