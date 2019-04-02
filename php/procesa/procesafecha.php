<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$rut_usr = $_SESSION['rut'];
//==========================================================================================|
//----------------------------Preparacion de validacion-------------------------------------|
//==========================================================================================|
$fecha_actual = date("Y-m-d");                                                              // obtenemos fecha actual y la forma teamos 
if (!empty($_POST['fechasolicitada'])) {                                                    // validacion de campos vacios
        echo '<br>pasa vacio';
        if(strlen($_POST['fechasolicitada']) == 10){                                        //validacion de cantidad de caracteres
                echo '<br>pasa largo';

    //------------------------valiidacion de fecha mas brigida------------------------------|
                    $fechasolicitada = $_POST['fechasolicitada'];
                    $valores = explode('-', $fechasolicitada);
                    var_dump($valores);
                    echo '<br>';

                    if (count($valores)==3) {                                               //validacion de los 3 valores del array
                        echo '<br>hay 3 casillas, en el array';
                                    if(checkdate($valores[1] ,$valores[2] ,$valores[0])){   //fecha existe en calendario
                                        echo '<br>la fecha esta ok';

//=======================================================================================================|
//---------Buscamos el id_fecha de los campos que tengan como fecha_asignada el valor solicitado---------|
//=======================================================================================================|
$cupomaximo = 25;                                                                           //Debemos hacer una consulta a la base de datos 
//y recuperar el valor maximo ingresado

$sql_buscarporfecha='SELECT id_fecha FROM TA_fecha WHERE fecha_asignada = ?';               //Aqui podemos hacer una consulta a la BD, buscando 
$sentencia_buscarfecha=$conn->prepare($sql_buscarporfecha);                                 //el numero de filas total correspondietes a ese dia.
$sentencia_buscarfecha->execute(array($fechasolicitada));
$resultadobuscarfecha = $sentencia_buscarfecha->fetchAll();

$contcupos = 0;                                                                            // este tomodachi se encargara de incrementar cada vez que 
//obtengamos una  fila, de esta manera al terminar al iteracion 

//tendremos el total de filas obtenidas

foreach ($resultadobuscarfecha as $fenc) {                                                  //recorremos el resultado de la consulta
$contcupos++;                                                                       //le sumamos uno al tomodachi por iteracion
echo '<br>';
echo 'Contador: '.$contcupos;
}

$cuposdisponibles = $cupomaximo - $contcupos;                                               //definimos que 25 es el maximo legal de personas que deben atender
echo '<br>Cupos Disponibles: ';                                                             // en la muni entonces le restamos el total de registros obtenidos 
echo $cuposdisponibles;    

if ($cuposdisponibles<=0) {                                                                 //si la variable antes mencionada es menor o igual a 0, se vuelve a 
    $_SESSION['nohaycupos']=true;                                                           //datosfecha.php y  se indica el problema
     header('location:../datosfecha.php');                                               
                                                                                            //echo '<br>No hay cupos disponibles';

}else {                                                                                     //Si hay cupos disponibles, guardamos la fecha en una variable de 
                                                                                            //sesion para llenar las tablas mas adelante
    $_SESSION['fechasolicitada']=$fechasolicitada;
   

    echo '<br>Hay cupos disponibles, reservando...';                                           
                                   
    echo '<br>' .$fechasolicitada;
    //--

    $select_preguntar = 'SELECT id_persona FROM TA_persona WHERE rut_persona = ?';           // Definimos, preparamos, ejecutamos 
    $sentencia_preguntar = $conn->prepare($select_preguntar);                       //consulta sql y obtenemos datos, segun el resultado 
    $sentencia_preguntar->execute(array($rut_usr));                                 //se tomaran dos cursos de accion diferentes
    $resultado_preguntar = $sentencia_preguntar->fetch();


    $idpersona = $resultado_preguntar[0];

    $select_validafecha = 'SELECT id_fecha 
    FROM ta_fecha 
    WHERE fecha_asignada = (?)
    AND fk_id_persona = (?)';


    $select_validafecha = $conn->prepare($select_validafecha);

    $select_validafecha->execute(array($fechasolicitada, $idpersona));

    $resultadofech = $select_validafecha->fetchall();



$contsoli=0;
foreach ($resultadofech as $soli) {
    $contsoli++;
}



if ($contsoli==0) {
    echo $contsoli;

    header('location:../datospersonales.php');                                                                                        
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



}else {
    $_SESSION['existe2']=true;
    $resultadofech==null;
    $resultado_preguntar == null;

    header('location:../datosfecha.php');  
} //todo este bloque, debe estar en el proximo procesa, aqui solo sacamos la fecha, namas
 }

                                        
                                        
                                    }else {//fecha existe en calendario else
                                            echo '<br>La fecha no existe.';
                                            $_SESSION['noesfecha']=true;
                                            $resultadobuscarfecha=null;
                                            $conn=null;
                                            header('location:../datosfecha.php');
                                    }//fecha existe en calendario
                        
                    }else {//validacion de los 3 valores del array else
                        echo 'Formato invalido';
                        $_SESSION['noesfecha']=true;
                        $resultadobuscarfecha=null;
                        $conn=null;
                        header('location:../datosfecha.php');
                    }//validacion de los 3 valores del array 
               

                }else {//validacion de cantidad de caracteres else
                        echo 'FALLO caracteres';
                        $_SESSION['noesfecha']=true;
                        $resultadobuscarfecha=null;
                        $conn=null;
                        header('location:../datosfecha.php');
                }//validacion de cantidad de caracteres

}else {// validacion de campos vacio elses
        echo 'FALLO esta vacio';
        $_SESSION['vacios']=true;
        $resultadobuscarfecha=null;
        $conn=null;
         header('location:../datosfecha.php');
}// validacion de campos vacios



//$_SESSION['id_archivo']

//$_SESSION['id_archivo']


/*
                                                                                          //fin else cupos disponibles

    echo '<br> Pasa insert a fecha, obteniendo id';

//Recuperamos Id_fecha
                                                
$select_validafecha = 'SELECT id_fecha 
FROM ta_fecha 
WHERE fecha_asignada = (?) 
AND fk_id_persona = (?)';

$select_validafecha = $conn->prepare($select_validafecha);

$select_validafecha->execute(array($fechasolicitud, $idpersona));

$resultadofech = $select_validafecha->fetch();


$_SESSION['id_fecha'] = $resultadofech['id_fecha'];
echo $_SESSION['id_fecha'];  











if ($cuposdisponibles>0) {
echo '<br> Pasa cupos disponibles';
    
//==========================================================================================|
//--------------------------------Insert a TA_fecha-----------------------------------------|
//==========================================================================================|

                $insert_fecha = 'INSERT INTO ta_fecha(
                    fecha_asignada, 
                    fk_id_persona)
                    VALUES (?,?)';
                   

                $sentencia_insertfecha = $conn->prepare($insert_fecha);

                

                if ($sentencia_insertfecha->execute(array($fechasolicitud, $idpersona))) {
                    echo '<br> Pasa insert a fecha, obteniendo id';
//==========================================================================================|
//--------------------------------Recuperamos Id_fecha--------------------------------------|
//==========================================================================================|


                                            $select_validafecha = 'SELECT id_fecha 
                                                                    FROM ta_fecha 
                                                                    WHERE fecha_asignada = (?) 
                                                                    AND fk_id_persona = (?)';

                                            $select_validafecha = $conn->prepare($select_validafecha);

                                            $select_validafecha->execute(array($fechasolicitud, $idpersona));

                                            $resultadofech = $select_validafecha->fetch();
                                        
                                           
                                            $_SESSION['id_fecha'] = $resultadofech['id_fecha'];
                                            echo $_SESSION['id_fecha'];
//==========================================================================================|
//--------------------------------INSERT a TA_solicitud-------------------------------------|
//==========================================================================================|

                                                echo '<br> vamos a evaluar la existencia del id_fecha';
                                            if ($_SESSION['id_fecha']) {
                                                echo '<br> ID obtenida, pasa a insert de solicitud';

                                                        $insert_solicitud = 'INSERT INTO ta_solicitud(
                                                            fk_id_persona, 
                                                            fk_id_archivo,
                                                            fk_id_licencia,
                                                            fk_id_fecha,
                                                            fk_id_direccion,
                                                            estado_solicitud)
                                                            VALUES (?,?,?,?,?,?)';
                                                            $estadosolicitud = 'Pendiente';

                                                        $sentencia_solicitud = $conn->prepare($insert_solicitud);  
                                                        if ($sentencia_solicitud->execute(array($idpersona , $idarchivo ,$idlicencia ,$_SESSION['id_fecha'],$iddireccion ,$estadosolicitud ))) {

                                                                    echo '<br> Solicitud ingresada exitosamente';


                                                            
                                                        }else {
                                                            echo '<br> No se pudo ingresar la solicitud, falla modulo finak';
                                                        }


                                            }else {
                                                echo '<br> No se obtuvo id de fecha, penunltimo modulo';
                                            }
                }else {//if si se realiza el insert de fecha
                    echo '<br> no se logro insertar la info a fecha';
                }
}else {// inf si hay cupos
    echo '<br> No hay cupos';
} 



*/