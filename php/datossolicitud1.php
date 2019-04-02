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


    <title>Detalles de la Solicitud!</title>
  </head>
  <body>
   <header>
   
   </header>

        <div class="container">
                                <div class="barra">
                                                    <div class="progress">
                                                            <div class="determinate" style="width: 60%"></div>
                                                    </div>
                                </div>

                                <br>

                                <form name="" id="formu" class="mt-5" enctype="multipart/form-data" action="procesa/procesadatossolicitud.php"  method="POST">

                            

                                                <h1 class="h2 mb-4 mt-1 font-weight-normal">Detalles del Tramite</h1>

                                                <small> Recuerda que tu licencia debe haber sido <b class="abajito">emitida</b> por la comuna de <b class="abajito">Padre Hurtado</b> para que tu solicitud sea aprobada.</small>
                                                <br>
                                                <br>

                                                <div class="form-group">
                                                                <!-- Separador de campos -->
                                                                <div class="row">    
                                                                                <div class="input-field col s12">
                                                                                        <select name="claselicencia" id="claselicencia" required="">
                                                                                                 <option value="0">Seleccione una opción</option>
                                                                                                 <?php foreach($resultado_listalicencias as $lic): ?>
                                                                                                        <option value="<?php echo $lic['id_cls_licencia'];?>" ><?php echo $lic['tipo_licencia'];?></option>     
                                                                                                  <?php endforeach?>
                                                                                                
                                                                                        </select>
                                                                                        <label for="claselicencia">Licencia</label>
                                                                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione la clase de la Licencia a renovar</span>
                                                                                </div>        
                                                                </div>

                                                                 <!-- Separador de campos -->
                                                
                                                               
                                                                <!-- Separador de campos -->
                                                                <div class="row">    
                                                                                <div class="input-field col s12">
                                                                                        <select class="" name="comunalic" id="comunalic" required="">
                                                                                                 <option value="0">Selecciona una Comuna</option>
                                                                                                 <?php foreach($resultado_listacomuna as $nombrecomuna): ?>
                                                                                                        <option value="<?php echo $nombrecomuna['id_comuna'];?>" <?php if ($nombrecomuna['nombre_comuna'] == 'Padre Hurtado') {
                                                                                                                echo ' selected';
                                                                                                        } ?> ><?php echo utf8_encode($nombrecomuna['nombre_comuna']);?></option>     
                                                                                                  <?php endforeach?>
                                                                                                
                                                                                        </select>
                                                                                        <label for="comunalic">Comuna de origen</label>
                                                                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione la comuna que le otorgó la licencia</span>
                                                                                </div>        
                                                                </div>
                                                                <!-- Separador de campos -->

                                                                <!-- Separador de campos -->
                                                                <div class="row">    
                                                                        <div class="input-field col s12">
                                                                                <input type="date" class="input-oscuro" name="fechacontrol" placeholder="" min="2018-01-01" required
                                                                                >
                                                                                <label for="fechacontrol">Fecha de Control</label>
                                                                                <span class="abajito" data-error="wrong" data-success="right">Se desplegará un menú cuando haga click</span>
                                                                        </div>        
                                                                </div> 
                                                                 <!-- Separador de campos -->
                                                                 <br>
                                                                 <h1 class="h2 mb-4 mt-1 font-weight-normal">Confirmacion de Domicilio</h1>
                                                                 <small>Necesitamos confirmar que seas residente de nuestra comuna, sube una foto o imagen de tu <b class="abajito">certificado de residencia</b>.</small>
                                                                 
                                                                 <br>
                                                                 <!-- Separador de campos -->
                                                            

                                                            

                                                                <!-- Separador de campos -->

                                                               

                                                                <!-- Separador de campos -->

                                                              
                                                </div>
                                                               
                                                <br>
                                                <button class="button mt-3 mb-4" id=""  type="submit" >
                                                            Continuar
                                                            <div class="button__horizontal"></div>
                                                            <div class="button__vertical"></div>
                                                </button>
                                                <br>
                                                <small class="">Perfecto!, da click en <b>"Continuar"</b> para seleccionar el dia y confirmar la solicitud.</small>

                                                <div class="row">
                                                            <div class="input-field col s12">
                                                                        <?php include("procesa/imprvalidacion.php"); ?>
                                                            
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

   
    
    
</body>
</html>


