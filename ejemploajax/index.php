<?php

include_once '../intranet/phpintra/conexion.php'; 

$listarregiones = "SELECT id_region, nombre_region FROM ta_region ORDER BY nombre_region ASC";

$sentencia_listarreg = $conn->prepare($listarregiones);// Preparamos la consulta a la base de datos
$sentencia_listarreg->execute();            // Ejecutamos la consulta
$resultado_listarreg = $sentencia_listarreg->fetchAll(); //Obtenemos los datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Ajax-Simple</title>
</head>
<body>

    <div class="container">
        <div class="formulario">

        <form name="form1" id="formu" class="mt-5" action="procesa/procesadatospersonales.php"  method="POST">

                            

<h1 class="h2 mb-4 mt-1 font-weight-normal">Datos de Residencia</h1>


<div class="form-group">



                <div class="row">    
                                <div class="input-field col s12">
                                        <select name="region" id="region" onblur="javascript:cargarcomunas();">
                                                  <option value="0">Selecciona una Región</option>
                                                  <?php foreach($resultado_listarreg as $nombreregion): ?>
                                                        <option value="<?php echo $nombreregion['id_region'];?>"><?php echo utf8_encode($nombreregion['nombre_region']);?></option>     
                                                  <?php endforeach?>
                                        </select>
                                        <label for="regiones">Region</label>
                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione su región de residencia</span>
                                </div>        
                </div>
                <!-- Separador de campos -->
                <div class="row">    
                                <div class="input-field col s12">
                                        <select name="comunas" id="comunas" onclick="javascript:cargarcomunas();">
                                                 <option value="0">Selecciona una Comuna</option>
                                                
                                        </select>
                                        <label for="comunas">Comuna</label>
                                        <span class="abajito" data-error="wrong" data-success="right">Seleccione su comuna de residencia</span>
                                </div>        
                </div>

              
</div>
               
<br>
<button class="button mt-3 mb-4" id=""  type="button" >
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
                <div id="mensaje"></div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        function EnviarDatos(){
            var region = document.getElementById('region').value;

            $.ajax({
                type:'POST',
                url: 'backend.php',
                data:('region='+region),
                success:function(respuesta){
                    if (respuesta=1) {

                        $('#mensaje').html('Tu mensaje se ha enviado correctamente');

                        $('#comunas').append($('<option>', {
                            value: region,
                            text: 'My option'+region
                        }));
                        
                    }else{
                        if (respuesta=2) {
                            $('#mensaje').html('Tu mensaje se ha enviado correctamente');

                                $('#comunas').append($('<option>', {
                                    value: region,
                                    text: 'My option'+(region+1)+''
                                }));
                                                            
                        }else{
                            $('#mensaje').html('Tu mensaje falló');
                        }
                    }


                }
            })
        }
    </script>

</body>
</html>