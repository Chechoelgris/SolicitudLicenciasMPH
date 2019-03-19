<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();

$listarregiones = "SELECT id_region, nombre_region FROM ta_region ORDER BY nombre_region ASC";

$sentencia_listarreg = $conn->prepare($listarregiones);// Preparamos la consulta a la base de datos
$sentencia_listarreg->execute();            // Ejecutamos la consulta
$resultado_listarreg = $sentencia_listarreg->fetchAll(); //Obtenemos los datos

// Consulta de comunas

$listarcomunas = "SELECT id_comuna, nombre_comuna FROM ta_comuna WHERE fk_id_region = ?";
$rm=16;
$sentencia_listacomunas = $conn->prepare($listarcomunas);// Preparamos la consulta a la base de datos
$sentencia_listacomunas->execute(array($rm));            // Ejecutamos la consulta
$resultado_listacomuna = $sentencia_listacomunas->fetchAll(); //Obtenemos los datos




?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script></script>
    <link rel="stylesheet" href="../css/nivel1.css">


    <title>Datos de Residencia!</title>
  </head>
  <body>
   <header>
   
   </header>

        <div class="container">
                                <div class="barra">
                                                    <div class="progress">
                                                            <div class="determinate" style="width: 40%"></div>
                                                    </div>
                                </div>

                                <br>

                                <form name="form1" id="formu" class="mt-5" action="procesa/procesadatosdireccion.php"  method="POST">

                            

                                                <h1 class="h2 mb-4 mt-1 font-weight-normal">Datos de Residencia</h1>

                                                <small>Hola <b class="abajito"><?php echo $_SESSION['nombre']; ?></b>, Recuerda que debes ser residente de la comuna de <b class="abajito">Padre Hurtado</b> para que tu solicitud sea aprobada.</small>
                                                <br>
                                                <br>

                                                <div class="form-group">

                                                
                                                                <!--
                                                                <div class="row">    
                                                                                <div class="input-field col s12">
                                                                                        <select name="regiones" id="regiones" onblur="javascript:cargarcomunas();">
                                                                                                  <option value="0">Selecciona una Región</option>
                                                                                                  <?php //foreach($resultado_listarreg as $nombreregion): ?>
                                                                                                        <option value="<?php //echo $nombreregion['id_region'];?>"><?php //echo utf8_encode($nombreregion['nombre_region']);?></option>     
                                                                                                  <?php //endforeach?>
                                                                                        </select>
                                                                                        <label for="regiones">Region</label>
                                                                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione su región de residencia</span>
                                                                                </div>        
                                                                </div>
                                                                -->
                                                                <!-- Separador de campos -->
                                                                <div class="row">    
                                                                                <div class="input-field col s12">
                                                                                        <select name="comunas" id="comunas">
                                                                                                 <option value="0">Selecciona una Comuna</option>
                                                                                                 <?php foreach($resultado_listacomuna as $nombrecomuna): ?>
                                                                                                        <option value="<?php echo $nombrecomuna['id_comuna'];?>"><?php echo utf8_encode($nombrecomuna['nombre_comuna']);?></option>     
                                                                                                  <?php endforeach?>
                                                                                                
                                                                                        </select>
                                                                                        <label for="comunas">Comuna</label>
                                                                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione su comuna de residencia</span>
                                                                                </div>        
                                                                </div>

                                                                 <!-- Separador de campos -->
                                                                <div class="row">    
                                                                        <div class="input-field col s12">
                                                                        <input type="text" id="calle" name="calle" class="input-oscuro" required=""
                                                                        value="<?php //if ($_SESSION['encontrado']) {
                                                                                //echo utf8_encode($_SESSION['apellidom_obtenido']);
                                                                                //}?>" >
                                                                                <label for="calle">Calle o Pasaje</label>
                                                                                <span class="abajito" data-error="wrong" data-success="right">Ingrese el nombre de la calle en donde vive</span>
                                                                        </div>        
                                                                </div> 

                                                                <!-- Separador de campos -->

                                                                <div class="row">    
                                                                        <div class="input-field col s6">
                                                                        <input type="text" id="numero" name="numero" class="input-oscuro" required=""
                                                                        value="<?php //if ($_SESSION['encontrado']) {
                                                                                //echo utf8_encode($_SESSION['apellidom_obtenido']);
                                                                                //}?>" >
                                                                                <label for="numero">Numero</label>
                                                                                <span class="abajito" data-error="wrong" data-success="right">Numeracion</span>
                                                                        </div>    
                                                                        
                                                                        <div class="input-field col s6">
                                                                                <input type="text" id="otro" name="otro" class="input-oscuro" 
                                                                                value="<?php //if ($_SESSION['encontrado']) {
                                                                                        //echo utf8_encode($_SESSION['apellidom_obtenido']);
                                                                                        //}?>" >
                                                                                        <label for="otro">Otro</label>
                                                                                        <span class="abajito" data-error="wrong" data-success="right">Casa /block / Dpto</span>
                                                                                </div>  
                                                                </div> 

                                                                <!-- Separador de campos -->

                                                              
                                                </div>
                                                               
                                                <br>
                                                <button class="button mt-3 mb-4" id=""  type="submit" >
                                                            Continuar
                                                            <div class="button__horizontal"></div>
                                                            <div class="button__vertical"></div>
                                                </button>
                                                <br>
                                                <small class="">Tranquilo, son solo unos pocos datos, y solo los pediremos <b>una vez</b>. Tu proxima visita cargará estos datos automaticamente.</small>

                                                <div class="row">
                                                            <div class="input-field col s12">
                                                                        <?php // include("procesa/imprvalidacion.php"); ?>
                                                            
                                                            </div>
                                                </div>
                                </form>
        </div>


   <footer>
   </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
  
    <script>
             $(document).ready(function(){
                $('select').formSelect();
        });
    </script>

    <script>
            function cargarcomunas(){
                
                var region = document.getElementById('regiones').value;

                $.ajax({
                        type:'POST',
                        url: 'procesa/consultaregion.php',
                        data:(region),
                        success:function(respuesta){

                        //if (respuesta=1) {
                                alert(region);
                               
                               
                                
                        }
                })//ajax

            }//funcion
    </script>
   
    
    
</body>
</html>


