<?php
session_start();
utf8_encode($_SESSION['tipo']);
if  (!isset($_SESSION['tipo'])) {

  header('Location:../../login.php');
}//validacion de sesion iniciada
if ($_SESSION['tipo']=='Funcionario') {
  header('Location:../../login.php');
}//validacion de perfil de sesion

include_once 'conexion.php';//Conexion a la Base de datos

/*$sql = 'SELECT id_solicitud NumeroSolicitud, ta_persona.rut_persona RUT, ta_persona.nombre_persona Nombre, ta_persona.apellidop_persona Apellido, 
            
ta_fecha.fecha_asignada FechaControl, ta_hora.hora_asignada Hora,

ta_direccion.comuna_dir Comuna, ta_direccion.calle_dir Calle, ta_direccion.numero_dir N°, 

ta_acreditadomicilio.ruta_archivo Archivo, ta_solicitud.estado_solicitud Estado  

FROM ta_solicitud 

INNER JOIN ta_persona 
ON ta_solicitud.fk_id_persona = ta_persona.id_persona 

INNER JOIN ta_direccion 
ON ta_solicitud.fk_id_persona = ta_direccion.fk_id_persona

INNER JOIN ta_fecha
ON ta_solicitud.fk_id_fecha = ta_fecha.id_fecha

INNER JOIN ta_hora
ON ta_solicitud.fk_id_hora = ta_hora.id_hora

INNER JOIN ta_acreditadomicilio
ON ta_solicitud.fk_id_archivo = ta_acreditadomicilio.id_archivo'; */ //Definimos la consulta a la base de datos

$sql = "SELECT id_solicitud , ta_persona.rut_persona , ta_persona.nombre_persona , ta_persona.apellidop_persona , ta_fecha.fecha_asignada , ta_hora.hora_asignada ,ta_direccion.comuna_dir , ta_direccion.calle_dir , ta_direccion.numero_dir , ta_acreditadomicilio.ruta_archivo , ta_solicitud.estado_solicitud   
from ta_solicitud 

INNER JOIN ta_persona 
ON ta_solicitud.fk_id_persona = ta_persona.id_persona 

INNER JOIN ta_direccion 
ON ta_solicitud.fk_id_persona = ta_direccion.fk_id_persona

INNER JOIN ta_fecha
ON ta_solicitud.fk_id_fecha = ta_fecha.id_fecha

INNER JOIN ta_hora
ON ta_solicitud.fk_id_hora = ta_hora.id_hora

INNER JOIN ta_acreditadomicilio
ON ta_solicitud.fk_id_archivo = ta_acreditadomicilio.id_archivo";

$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos
$sentencia->execute();            // Ejecutamos la consulta
$resultado = $sentencia->fetchAll(); //Obtenemos los datos
$artxpag = 5; //Se definen la cantidad de usuarios a mostrar por paginacion
$totalobtenido = $sentencia->rowCount();//Contamos la cantidad de elementos obtenidos
$paginas = $totalobtenido/$artxpag;//calculamos la cantidad de paginas a necesitar
$paginas = ceil($paginas);//Redondeamos hacia arriba para poder mostrar TODOS los elementos obtenidos

echo $paginas;
//var_dump($resultado);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">

        <?php foreach($resultado as $pend):  ?>

        <div class="alert-info">
           
                <?php echo $pend['id_solicitud'].' '.$pend['rut_persona'].' '.utf8_encode($pend['nombre_persona']).' '.
                utf8_encode($pend['apellidop_persona']).' '. $pend['fecha_asignada'].' '. $pend['hora_asignada'].' '. utf8_encode($pend['comuna_dir'])
                .' '. utf8_encode($pend['calle_dir']).' '. $pend['numero_dir'].' '. $pend['ruta_archivo'].' '. $pend['estado_solicitud']
                .' '. $pend['fecha_asignada'] ; ?> 

        </div>
        <br>
        <?php endforeach ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>