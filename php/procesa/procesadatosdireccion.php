<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$comuna = $_POST['comunas'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$id_persona = $_SESSION['id_persona'];
//otro
//$id = $_SESSION['id_persona'];
$region = 16;

        $select_preguntar = 'SELECT * FROM TA_direccion WHERE fk_id_persona = ?';           // Definimos, preparamos, ejecutamos 
        $sentencia_preguntar = $conn->prepare($select_preguntar);                       //consulta sql y obtenemos datos, segun el resultado 
        $sentencia_preguntar->execute(array($id_persona));                                 //se tomaran dos cursos de accion diferentes
        $resultado_preguntar = $sentencia_preguntar->fetch();
        $copiaencontrado = false;
        if ($resultado_preguntar) {
            $copiaencontrado = true;
        }
        

// validamos que no haya campos vacios
if (!empty($_POST['comunas']) && !empty($_POST['calle']) && !empty($_POST['numero'])) {
                //validamos que los campos no superen el largo definido por mua
                if (strlen($_POST['comunas']) < 30 && strlen($_POST['calle']) < 40 && strlen($_POST['numero']) < 7) {
                                //verificamos si se enviaron datos en el campo otro
                                if ($_POST['otro']){
                                                //guardamos su valor en una variable
                                                $dpto_dir = $_POST['otro'];
                                                //creamos esta variable booleana para decidir si se hace un insert o update
                                                $existeotro = true;
                                                echo '<br>Otro: ' ;
                                                echo $dpto_dir ;

                                }else{          //oshraeh
                                                $existeotro = false;
                                }//fin if post [otro]

                                
                                //Aqui se hace la magia!~~

                            if ($copiaencontrado) { // Si esto es true, debemos hacer un update y no un insert
                                echo '<br>encontramos registros, haremos un update<br>';

                                            if ($existeotro){ //revisamos si ingresaron algun dato en otros o no, si lo hizo, se
                                                echo 'El campo otros fue llenado, procedemos...<br>';  

                                                            $consulta_update ='UPDATE TA_direccion SET calle_dir=(?), numero_dir=(?), dpto_dir=(?), fk_id_comuna=(?)
                                                            WHERE fk_id_persona=(?)';
                                                            
                                                            $sentencia_update = $conn->prepare($consulta_update); 
                                                           
                                                            if ($sentencia_update->execute(array(utf8_decode($calle), $numero, utf8_decode($dpto_dir), $comuna, $id_persona))){
                                                                    echo 'editado exitosamente  brotah<br>';
                                                                    

                                                                    $select_validacion = 'SELECT id_direccion FROM TA_direccion WHERE fk_id_persona = ?';
                                                                    $sentencia_consultar = $conn->prepare($select_validacion);
                                                                    $sentencia_consultar->execute(array($id_persona));
                                                                    $resultado = $sentencia_consultar->fetch();

                                                                    
                                                                    $_SESSION['id_direccion'] = $resultado['id_direccion'];
                                                                    
                                                                    if (!$_SESSION['id_direccion']) {
                                                                        echo 'problemas para obtener el id direccion';
                                                                        header('location:../datosdireccion.php');
                                                                    }
                                                                   
                                                                

                                                                    $sentencia_consultar=null;
                                                                    $conn=null;


                                                                    header('location:../datossolicitud.php'); // ingresar redireccion si el update es exitoso
                                                            }else{
                                                                $_SESSION['fallaupdate'] = true;
                                                                $sentencia_update=null;
                                                                $conn=null;
                                                                echo ' Fallo el update con otros encontrado<br>';
                                                                header('location:../datosdireccion.php');
                                                            } //fin if sentencia update



                                            }else {
                                                echo ' No se lleno otros, procedemos <br>';
                                                            $consulta_update ='UPDATE TA_direccion 
                                                                               SET calle_dir=(?),
                                                                               numero_dir=(?),
                                                                               fk_id_comuna=(?)
                                                                               WHERE fk_id_persona=(?)';

                                                            $sentencia_update = $conn->prepare($consulta_update); 
                                                            if ($sentencia_update->execute(array(utf8_decode($calle), $numero,  $comuna, $id_persona))){
                                                                                echo 'update sin otros exitoso<br>';

                                                                                $select_validacion = 'SELECT id_direccion 
                                                                                FROM TA_direccion 
                                                                                WHERE fk_id_persona = ?';

                                                                    $sentencia_consultar = $conn->prepare($select_validacion);
                                                                    $sentencia_consultar->execute(array($id_persona,));
                                                                    $resultado = $sentencia_consultar->fetch();
                                                                
                                                                    $_SESSION['id_direccion'] = $resultado['id_direccion'];
// aqui!!
                                                                    if (!$_SESSION['id_direccion']) {
                                                                        echo 'problemas para obtener el id direccion';
                                                                        header('location:../datosdireccion.php');
                                                                    }
                                                                   
                                                                    $sentencia_consultar=null;
                                                                    $conn=null;
                                                                 header('location:../datossolicitud.php');
                                                            }else{
                                                                $_SESSION['fallaupdate'] = true;
                                                                $sentencia_update=null;
                                                                $conn=null;

                                                                echo ' falla update sin otros<br>';
                                                                header('location:../datosdireccion.php');
                                                            } 

                                            }//fin if existeotro
                                                            


                            }else{//si no encuentra resultados, hay que hacer un insert
                                echo ' <br>No encontramos resultados, se hara un insert<br>';
                                                if ($existeotro) {
                                                    echo ' insert con existe otro<br>';
                                                            $consulta_insert ='INSERT INTO TA_direccion(
                                                                calle_dir, 
                                                                numero_dir,
                                                                dpto_dir, 
                                                                fk_id_persona,
                                                                fk_id_comuna
                                                                ) 
                                                            VALUES (?,?,?,?,?)';
                                                            $sentencia_insert = $conn->prepare($consulta_insert);

                                                            if ($sentencia_insert->execute(array(utf8_decode($calle), $numero, $dpto_dir, $id_persona, $comuna))){
                                                                echo 'Datos nuevos (insert) guardados exitosamente  brotah<br>';
//                  Obtenemos el id para las relaciones

                                                                            $select_validacion = 'SELECT id_direccion FROM TA_direccion WHERE fk_id_persona = ?';
                                                                            $sentencia_consultar = $conn->prepare($select_validacion);
                                                                            $sentencia_consultar->execute(array($id_persona));
                                                                            $resultado = $sentencia_consultar->fetch();

                                                                           
                                                                            $_SESSION['id_direccion'] = $resultado['id_direccion'];
                                                                            if (!$_SESSION['id_direccion']) {
                                                                                echo 'problemas para obtener el id direccion';
                                                                                header('location:../datosdireccion.php');
                                                                            }
                                                                            $sentencia_consultar=null;
                                                                            $conn=null;
                                                                            header('location:../datossolicitud.php');
                                                                         

                                                            }else{
                                                                echo 'El insert con otros fallo <br>';
                                                                $_SESSION['fallainsert'] = true;
                                                                $sentencia_consultar=null;
                                                                $conn=null;
                                                                header('location:../datosdireccion.php');
                                                            } 

                                                 }else{
                                                    echo ' no hay otros ingresado, insert sin el<br>';
                                                            $consulta_insert ='INSERT INTO TA_direccion(
                                                                calle_dir, 
                                                                numero_dir,
                                                                fk_id_persona,
                                                                fk_id_comuna
                                                                ) 
                                                            VALUES (?,?,?,?,?)';
                                                            $sentencia_insert = $conn->prepare($consulta_insert);

                                                            if ($sentencia_insert->execute(array(utf8_decode($calle), $numero, $id_persona, $comuna))){
                                                                echo 'Datos nuevos guardados exitosamente  brotah<br>';
        //                  Obtenemos el id para las relaciones

                                                                            $select_validacion = 'SELECT id_direccion FROM TA_direccion WHERE fk_id_persona = ?';
                                                                            $sentencia_consultar = $conn->prepare($select_validacion);
                                                                            $sentencia_consultar->execute(array($id_persona));
                                                                            $resultado = $sentencia_consultar->fetch();

                                                                           
                                                                            $_SESSION['id_direccion'] = $resultado['id_direccion'];
                                                                            if (!$_SESSION['id_direccion']) {
                                                                                echo 'problemas para obtener el id direccion';
                                                                                header('location:../datosdireccion.php');
                                                                            }
                                                                            $sentencia_consultar=null;
                                                                            $conn=null;
                                                                         header('location:../datossolicitud.php');
                                                                        

                                                            }else{
                                                                echo '<br>fallo el insert sin otros<br>';
                                                                $_SESSION['fallainsert'] = true;
                                                                $sentencia_consultar=null;
                                                                $conn=null;
                                                             header('location:../datosdireccion.php');
                                                            }
                                                 }

                            }//fin if copia encontrado

                                
                }else {
                    $_SESSION['fallalongitud'] = true;
                    header('location:../datosdireccion.php');
                }//fin if largo de campos
        
}else {
    $_SESSION['vacios']=true;
    header('location:../datosdireccion.php');
} //fin if campos vacios

echo '<br>Id persona<br>';
echo $_SESSION['id_persona'];
echo '<br>Id direccion<br>';
echo $_SESSION['id_direccion'];
