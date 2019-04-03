<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
//==========================================================================================|
//--------------------------FUNCION QUE CREARA LA SOLICITUD---------------------------------|
//==========================================================================================|

    

//==========================================================================================|
//-------------Consultas Iniciales y capturamos datos enviados por POST---------------------|
//==========================================================================================|



//==========================================================================================|
$claselicencia = $_POST['claselicencia'];
$comunalic = $_POST['comunalic'];
if ($claselicencia==0 || $comunalic==0 ) {
    
echo'uno paso vacio, no hay mano<br>';
$_SESSION['vacios']=true;
header('location:../datossolicitud.php');

}
$fechacontrol = $_POST['fechacontrol'];
$persona = $_SESSION['id_persona'];
//==========================================================================================|
//mini validacion 

if ($_FILES['archivo']) {
    $archivo = $_FILES['archivo'];
}else {
    echo 'no esta llegando el archivo, whaat';
    $_SESSION['archivo']=true;
    header('location:../datossolicitud.php');
}

//==========================================================================================|
//-------------------Buscamos si existe solicitud asociada al RUT---------------------------|
//==========================================================================================|

// [A1=1][A2=2][A3=3][A4=4][A5=5][B=6][C=7][D=8][A1-A2 Ley 18.290=9]

$consultaexiste = 'SELECT * FROM ta_licencia WHERE fk_id_persona = ?';
$select_consultaexiste = $conn->prepare($consultaexiste);
$select_consultaexiste->execute(array($persona));
$resultadoconsultaexiste = $select_consultaexiste->fetch();

print_r ($resultadoconsultaexiste);

//==========================================================================================|
//-------------------------------Insert a TA_licencia---------------------------------------|
//==========================================================================================|

// [A1=1][A2=2][A3=3][A4=4][A5=5][B=6][C=7][D=8][A1-A2 Ley 18.290=9]

$insert_licencia = 'INSERT INTO ta_licencia(
                    fechacont_licencia, 
                    fk_id_cls_licencia, 
                    fk_id_comuna, 
                    fk_id_persona) 
                    VALUES (?,?,?,?)';

$sentencia_insertlicencia = $conn->prepare($insert_licencia);


if ($sentencia_insertlicencia->execute(array($fechacontrol, 
                                             $claselicencia,
                                             utf8_decode($comunalic), 
                                             $persona))){

    echo '<br>Insert de Licencia realizado con exito';
//                  Obtenemos el id para las relaciones
   



                $select_validalicencia = 'SELECT id_licencia 
                                          FROM ta_licencia 
                                          WHERE fk_id_persona = (?) 
                                          AND fechacont_licencia = (?)';
                $sentencia_consultarlic = $conn->prepare($select_validalicencia);
                $sentencia_consultarlic->execute(array($persona, $fechacontrol));

                $resultadolic = $sentencia_consultarlic->fetch();
               
                echo 'El id de su nuevo registro es: ';
                print_r($resultadolic['id_licencia']);
                $_SESSION['id_licencia'] = $resultadolic['id_licencia'];
               
}else {
    echo 'Problemas al insertar datos de licencia';
    $_SESSION['fallainsert']=true;
    header('location:../datossolicitud.php');

}

//==========================================================================================|
//------------------------Procesamiento y subida del archivo--------------------------------|
//==========================================================================================|

$uploadedfileload="true"; //Esta variable será el indicador que nos permita avanzar en el script 
$msg;

if ($_FILES['archivo']['size']>5000000){                                                                     // Validacion de tamaño
    $msg="La imagen pesa mas de 5MB, debes reducir su tamaño antes de subirla<BR>";
    $uploadedfileload="false";
}
echo 'pasa validacion de tamaño';
echo '<br>';
if (!($_FILES['archivo']['type'] =="image/jpeg" OR $_FILES['archivo']['type'] =="image/png")){// Validacion de formato
    $msg="Tu archivo tiene que ser JPG o png. Otros archivos no son permitidos<BR>";
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


//|==========================================================================================|
//|---------------------------Insert a TA_acreditadomicilio----------------------------------|
//|==========================================================================================|

if( file_exists($ruta) == true ){
            echo "<br><p>El archivo existe, procedemos a guardar su info en la bd</p>";

                    $insert_archivo ='INSERT INTO ta_acreditadomicilio(nombre_archivo, ruta_archivo) VALUES (?,?)';
                    $sentencia_insertar = $conn->prepare($insert_archivo);

                            if($sentencia_insertar->execute(array($nombrenuevo, $ruta))){
                                echo "<br><p>Se ha guardado la informacion del archivo correctamente, procedemos a obtener si id de archivo</p>";

                                        


                                        $select_validacion = 'SELECT id_archivo FROM ta_acreditadomicilio WHERE nombre_archivo = ?';
                                        $sentencia_consultar = $conn->prepare($select_validacion);
                                        $sentencia_consultar->execute(array($nombrenuevo));
                                        $resultado = $sentencia_consultar->fetch();
                                    
                                   
                                  echo '<br>Su ID de archivo es: '.$resultado['id_archivo'];
                                  $_SESSION['id_archivo'] = $resultado['id_archivo'];



//Tenemos todo listo, ahora solo queda subir la info a la solicitud.


//|==========================================================================================|
//|---------------------------------Insert a TA_Solicitud------------------------------------|
//|==========================================================================================|

//Recoleccion de datos final.
$a=$_SESSION['id_persona'];
$b=$_SESSION['id_archivo'];
$c=$_SESSION['id_licencia'];
$d='Pendiente';
$e=$_SESSION['id_fecha'];
$f=$_SESSION['id_direccion'];


                        include_once 'funcionsolicitud.php';   
                        
                        echo 'terminamos parse';
                        
                        if ($_SESSION['listo']) {
                            echo 'terminamos parse';
                            header('location:../ingresofinalizado.php');
                        }else {
                            echo "<br><p>Problema al ingresar la solicitud, algo anda mal.</p>";
                            $_SESSION['solicitud']=true;
                            header('location:../datosolicitud.php');
                        }



                                 

                            }else {
                                echo "<br><p>El archivo no se ha encontrado</p>";
                                $_SESSION['archivo']=true;
                                header('location:../datosolicitud.php');
                            }
}else{
    echo "<br><p>El archivo no se ha encontrado</p>";
    $_SESSION['archivo']=true;
    header('location:../datosolicitud.php');
}



