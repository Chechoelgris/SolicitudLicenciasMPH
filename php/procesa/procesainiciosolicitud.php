<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$rut_usr = $_POST['rut']; //Rut para consultar en la BD si existen registros, se asocia a variable local.
$_SESSION['rut'] = $_POST['rut']; //Creamos variable de sesion que contenga los datos enviados por post.
$_SESSION['encontrado'] = false;   // Creamos variable que indicara si encontramos o no resultados en la consulta con el rut.


        $select_preguntar = 'SELECT * FROM TA_persona WHERE rut_persona = ?';           // Definimos, preparamos, ejecutamos 
        $sentencia_preguntar = $conn->prepare($select_preguntar);                       //consulta sql y obtenemos datos, segun el resultado 
        $sentencia_preguntar->execute(array($rut_usr));                                 //se tomaran dos cursos de accion diferentes
        $resultado_preguntar = $sentencia_preguntar->fetch();

        if ($resultado_preguntar) {                                                     //Accion si encuentra registros en la bd.
            
            echo '<br>Datos encontrados!';                                              
            
            $_SESSION['id_obtenido'] = $resultado_preguntar['id_persona'];              //Creamos variables de sesion que guardaran
            $_SESSION['rut_obtenido'] = $resultado_preguntar['rut_persona'];            //los datos obtenidos de la bd a partir
            $_SESSION['nombre_obtenido'] = $resultado_preguntar['nombre_persona'];      //del rut ingresado, esto evitara que las personas 
            $_SESSION['apellidop_obtenido'] = $resultado_preguntar['apellidop_persona'];//tengan que volver a llenar todo el formulario
            $_SESSION['apellidom_obtenido'] = $resultado_preguntar['apellidom_persona'];
            $_SESSION['fechanac_obtenido'] = $resultado_preguntar['fechan_persona'];
            $_SESSION['sexo_obtenido'] = $resultado_preguntar['sexo_persona'];
            $_SESSION['correo_obtenido'] = $resultado_preguntar['correo_persona'];
            $_SESSION['telefono_obtenido'] = $resultado_preguntar['telefono_persona'];
            $_SESSION['encontrado']=true;                                               //Amiguin que nos indicara en el proximo archivo
                                                                                        //Si se encontraron o no datos para cargar en los input
                        /*echo '<br> id: '.$_SESSION['id_obtenido'];  
                        echo '<br> rut: '.$_SESSION['rut_obtenido'];                                                              //Es terrible buena onda este men
                        echo '<br> nombre: '.$_SESSION['nombre_obtenido'];
                        echo '<br> apep: '.$_SESSION['apellidop_obtenido'];
                        echo '<br> apem: '.$_SESSION['apellidom_obtenido'];
                        echo '<br> fechanac: '.$_SESSION['fechanac_obtenido'];
                        echo '<br> sex: '.$_SESSION['sexo_obtenido'];
                        echo '<br> email: '.$_SESSION['correo_obtenido'];
                        echo '<br> tel: '.$_SESSION['telefono_obtenido'];
                        echo '<br> enc: '.$_SESSION['encontrado'];*/ 
            header('location:../datospersonales.php');
            
        }else{
            echo '<br>No existe el men';
            $_SESSION['encontrado']=false;
            header('location:../datospersonales.php');
        }


/*
                                                                                                            // Para manejar archivo
$uploadedfileload="true"; //Esta variable será el indicador que nos permita avanzar en el script 
$msg;

if ($_FILES['archivo']['size']>2000000){                                                                     // Validacion de tamaño
    $msg="El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
    $uploadedfileload="false";
}
echo 'pasa validacion de tamaño';
echo '<br>';
if (!($_FILES['archivo']['type'] =="image/jpeg" OR $_FILES['archivo']['type'] =="image/gif")){// Validacion de formato
    $msg="Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
    $uploadedfileload="false";
}

echo 'pasa validacion de formato';
echo '<br>';

$nameFilearchivo= $_FILES['archivo']['name']; // obtenemos nombre del archivo
$tmpFilearchivo = $_FILES['archivo']['tmp_name']; // obtenemos ruta temporal del archivo 
                                                  //(aqui se suben por defecto siempre, luego hay que moverlos)

$info = new SplFileInfo($nameFilearchivo); // obtenemos la extensión del archivo
var_dump($info->getExtension()); // mostramos la extensión del archivo
$nombrenuevo = time().$info; // nuevo subfijo al nombre: fecha actual (con segundos) + extension. Asi todos seran diferentes.
$ruta = "../resources/subidas/"; // se define la ruta de destino.
$ruta = $ruta . basename( $nombrenuevo); // se le agrega al nombre actual el nuevo subfijo creado arriba, ahora no habran nombres repetidos.


if($uploadedfileload=="true"){
    if(move_uploaded_file($tmpFilearchivo, $ruta)) {
        echo "El archivo ".  basename( $nombrenuevo). 
        " ha sido subido";
    } else{
        echo "Ha ocurrido un error, trate de nuevo!";
    }
}else{echo $msg;}
echo '<br>';
echo $nombrenuevo;
echo '<br>';
echo $ruta;




// Hastá aqui, si el archivo cumple con las condiciones, se formatea y se sube al directorio indicado. 
//Ahora hay que ingresar su nombre en la bd, junto a su ruta, para poder acceder a el cuando haya que validar.


if( file_exists($ruta) == true )
echo "<p>El archivo existe</p>";
else
echo "<p>El archivo no se ha encontrado</p>";
$cer = 1;


    $select_validacion = 'SELECT * FROM TA_acreditadomicilio WHERE id_archivo = ?';
    $sentencia_consultar = $conn->prepare($select_validacion);
    $sentencia_consultar->execute(array($cer));
    $resultado = $sentencia_consultar->fetch();

   var_dump ($resultado);
   ?>

        <a href="<?php  echo $resultado['ruta_archivo']; ?>">as</a>

   <?php

*/

    