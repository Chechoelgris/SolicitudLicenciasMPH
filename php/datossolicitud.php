<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();

$listalicencias = "SELECT id_cls_licencia, tipo_licencia FROM ta_claselicencia ORDER BY id_cls_licencia ASC";

$sentencia_listalicencias = $conn->prepare($listalicencias);// Preparamos la consulta a la base de datos
$sentencia_listalicencias->execute();            // Ejecutamos la consulta
$resultado_listalicencias = $sentencia_listalicencias->fetchAll(); //Obtenemos los datos

// Consulta de comunas

$listarcomunas = "SELECT id_comuna, nombre_comuna FROM ta_comuna WHERE fk_id_region = ?";
$rm=16;
$sentencia_listacomunas = $conn->prepare($listarcomunas);// Preparamos la consulta a la base de datos
$sentencia_listacomunas->execute(array($rm));            // Ejecutamos la consulta
$resultado_listacomuna = $sentencia_listacomunas->fetchAll(); //Obtenemos los datos


//si le quitas el id al formulario, se trasnforma completamente y esta weno, saludos

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
									<br>Solicitud
								</h6>

							</div>

					</section>
					<section class="formulario bg-light text-center p-3 rounded-bottom">
							<h3 class=""><b>Licencia y acreditación</b></h3>
							<br>
							<h5 class="text-secondary">Indicanos los datos de la licencia que estas tramitando. </h5>
							<br>
							<form name="form1" id="formu" action="procesa/procesadatossolicitud.php" method="POST" >
                            <div class="form-row cont justify-content-center">
										<div class="form-group text-left col-md-6">
												<label for="claselicencia" class="text-info">Clase de Licencia</label>
												<select class="custom-select" name="claselicencia" id="claselicencia" required="">
                                                    	 <option value="0">Seleccione una opción</option>
                                                    	 <?php foreach($resultado_listalicencias as $lic): ?>
                                                              <option value="<?php echo $lic['id_cls_licencia'];?>" ><?php echo $lic['tipo_licencia'];?></option>     
                                                         <?php endforeach?>
                                                                                                
												</select>
												<small class="text-secondary" data-error="wrong" data-success="right">Deberás acreditar domicilio.</small>

										</div>				
                            </div>
<!-- Separador de campos -->              
                            <div class="form-row cont justify-content-center">
										<div class="form-group text-left col-md-6">
												<label for="comunalic" class="text-info">Comuna que la emite</label>
												<select class="custom-select" name="comunalic" id="comunalic" required="">
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