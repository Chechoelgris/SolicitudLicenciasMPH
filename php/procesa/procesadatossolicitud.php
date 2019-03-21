<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$claselicencia = $_POST['claselicencia'];
$comunalic = $_POST['comunalic'];
$fechacontrol = $_POST['fechacontrol'];
if ($_FILES['archivo']) {
    $archivo = $_FILES['archivo'];
}else {
    echo 'no esta llegando el archivo, whaat';
}


echo '<br>Clase de Licencia: ';
echo ' '.$claselicencia ;
echo '<br>Comuna que emitio la licencia: ';
echo ' '.$comunalic ;
echo '<br>Fecha den proximo control: ';
echo ' '.$fechacontrol ;



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
$ruta = "../../resources/subidas/"; // se define la ruta de destino.
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


if( file_exists($ruta) == true ){
            echo "<br><p>El archivo existe, procedemos a guardar su info en la bd</p>";

                    $insert_archivo ='INSERT INTO ta_acreditadomicilio(nombre_archivo, ruta_archivo) VALUES (?,?)';
                    $sentencia_insertar = $conn->prepare($insert_archivo);

                            if($sentencia_insertar->execute(array($nombrenuevo, $ruta))){
                                echo "<br><p>Se ha guardado la informacion del archivo correctamente, procedemos a obtener si id</p>";

                                        


                                        $select_validacion = 'SELECT id_archivo FROM ta_acreditadomicilio WHERE nombre_archivo = ?';
                                        $sentencia_consultar = $conn->prepare($select_validacion);
                                        $sentencia_consultar->execute(array($nombrenuevo));
                                        $resultado = $sentencia_consultar->fetch();
                                    
                                   
                                  echo $resultado['id_archivo'];
                                  $_SESSION['id_archivo'] = $resultado['id_archivo'];
                                  header('location:../datosfecha.php');

                            }else {
                                echo "<br><p>Hubo un problema con el insert, despaila</p>";
                            }
}else{
    echo "<br><p>El archivo no se ha encontrado</p>";

}


