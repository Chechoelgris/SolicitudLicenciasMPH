<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$rut_usr = $_POST['rut']; //Rut para consultar en la BD si existen registros, se asocia a variable local.


$_SESSION['rut'] = $_POST['rut']; //Creamos variable de sesion que contenga los datos enviados por post.
$_SESSION['encontrado'] = false;   // Creamos variable que indicara si encontramos o no resultados en la consulta con el rut.


       if (!empty($_POST['rut'])) { // validacion de campos vacios
            if(strlen($_POST['rut'])==12){//validacion de cantidad de caracteres

                    $select_preguntar = 'SELECT * FROM TA_persona WHERE rut_persona = ?';           // Definimos, preparamos, ejecutamos 
                    $sentencia_preguntar = $conn->prepare($select_preguntar);                       //consulta sql y obtenemos datos, segun el resultado 
                    $sentencia_preguntar->execute(array($rut_usr));                                 //se tomaran dos cursos de accion diferentes
                    $resultado_preguntar = $sentencia_preguntar->fetch();

                    if ($resultado_preguntar) {                                                     //Accion si encuentra registros en la bd.
                        
                       
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
                               
                        header('location:../datosfecha.php');

                       
                        
                    }else{
                        echo '<br>No existe el men';
                        $_SESSION['encontrado']=false;
                        
                        header('location:../datosfecha.php');
                    }

            }else {//validacion de cantidad de caracteres
                $_SESSION['fallalongitud'] = true;
                                
                header('location:../ingresorut.php');
            }

       }else {// validacion de campos vacios
            $_SESSION['vacios']=true;
            header('location:../ingresorut.php');
       }            


    