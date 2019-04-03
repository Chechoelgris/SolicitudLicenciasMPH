<?php
//|===============================================================|
//|----------------------Contar Aprobadas-------------------------|
//|===============================================================|
include_once 'conexion.php';
            $sql = "SELECT *   
                    from ta_solicitud 
                    WHERE estado_solicitud = ?";

            $acep = 'Aceptada';
            $sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos

           /* $sentencia->execute(array($acep)); // Ejecutamos la consulta
            $resultado = $sentencia->fetchAll(); //Obtenemos los datos
            $cont = 0;
            foreach ($resultado as $apro) {
                $cont++;
            }
            $aceptadas = $cont;
       */


            if ($sentencia->execute(array($acep))) {// Ejecutamos la consulta

                $resultado = $sentencia->fetchAll(); //Obtenemos los datos
                $cont = 0;
                
                foreach ($resultado as $apro) {
                    $cont++;
                }
                
                $_SESSION['aprobados'] = $cont;
            } else {
                echo 'aaa<br>aaaaaaaaa<br>aaaaaaaaaaaaa<br>aaaaaaaaa<br>aaaaaaa<br>aaaaaaaaaprobados<br>';
            }

//$_SESSION['aprobadas'] 
//|===============================================================|
//|----------------------Contar Aprobadas-------------------------|
//|===============================================================|

