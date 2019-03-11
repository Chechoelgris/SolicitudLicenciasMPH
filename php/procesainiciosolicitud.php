<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();
$rut_usr = $_SESSION['rut'];
/*
$archivo = $_FILES['archivo'];
$nameFilearchivo= $_FILES['archivo']['name'];
$tmpFilearchivo = $_FILES['archivo']['tmp_name'];




$ruta = "../resources/subidas/";
$ruta = $ruta . basename( $nameFilearchivo); 
if(move_uploaded_file($tmpFilearchivo, $ruta)) {
    echo "El archivo ".  basename( $nameFilearchivo). 
    " ha sido subido";

} else{
    echo "Ha ocurrido un error, trate de nuevo!";
}
*/



$uploadedfileload="true";
$msg;



if ($_FILES['archivo']['size']>2000000)                                                                    // Validacion de tamaño
{$msg="El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
$uploadedfileload="false";

}
echo 'pasa validacion de tamaño';
echo '<br>';
if (!($_FILES['archivo']['type'] =="image/jpeg" OR $_FILES['archivo']['type'] =="image/gif"))               // Validacion de formato
{$msg="Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false";
}
echo 'pasa validacion de formato';
echo '<br>';

$nameFilearchivo= $_FILES['archivo']['name'];
$tmpFilearchivo = $_FILES['archivo']['tmp_name'];

$ruta = "../resources/subidas/";
$ruta = $ruta . basename( $nameFilearchivo); 


if($uploadedfileload=="true"){

    if(move_uploaded_file($tmpFilearchivo, $ruta)) {
        echo "El archivo ".  basename( $nameFilearchivo). 
        " ha sido subido";
    
    } else{
        echo "Ha ocurrido un error, trate de nuevo!";
    }

}else{echo $msg;}
    