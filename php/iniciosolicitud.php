<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();
$_SESSION['rut'] = $_POST['rut'];
$rut_usr = $_SESSION['rut'];

$encontrado;

/*echo '<pre>';
var_dump($rut_usr);
echo '</pre>';
*/
                            
    $select_consulta = 'SELECT * FROM TA_persona WHERE rut_persona = ?';
    $sentencia_consultar = $conn->prepare($select_consulta);
    $sentencia_consultar->execute(array($rut_usr));
    $resultado = $sentencia_consultar->fetch();

    

    if (!$resultado) {

        //matar operacion
        //echo 'No se han encontrado datos de solicitud asociados a este rut';
        $encontrado = false; //Variable queda false, se usara para decidir que contenido mostrar.

        //header('Location:../../login.php');
        $conn=null; // Cerramos conexion a base de datos 
        $sentencia_consultar=null; //  //limpiamos consulta y operaciones.

    }else{

        $_SESSION['id'] = $resultado['id_persona'];//tomamos a la persona para cargar sus datos
        $encontrado = true; //Variable queda true, se usara para decidir que contenido mostrar.
    
        $select_consulta2 = 'SELECT * FROM TA_solicitud WHERE fk_id_persona = ?';           //Consulta Base de datos
        $sentencia_consultar2 = $conn->prepare($select_consulta2);
        $sentencia_consultar2->execute(array($_SESSION['id']));
        $resultado2 = $sentencia_consultar2->fetch();
      
        
                                                                                            //Consulta Base de datos
    } 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>Login Administracion SSH</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
        <script src="js/validarut.js" type="text/javascript" ></script>
        <link rel="stylesheet" href="../css/nivel1.css">
    </head>
    <body>
            <header>
                    <section>
                            <article>
                                    <aside>

                                    </aside>
                            </article>
                    </section>

            </header>
        

            <div class="container text-center"> 
                    <h1>Datos Personales</h1>
                            <article>
                                    <form action="procesainiciosolicitud.php" method="POST" enctype="multipart/form-data">

                                        <input type="file" name="archivo">
                                        <br>
                                        <button class="button mt-3 " id="envialogin"  type="submit" >
                                                subir
                                                <div class="button__horizontal"></div>
                                                <div class="button__vertical"></div>
                                  </button>

                                    </form>
                            </article>
                    </section>
            </div>

            <footer>
                    <section>
                            <article>
                                    <aside>

                                    </aside>
                            </article>
                    </section>                    
            </footer>
    </body>
</html>

   
    