<?php
session_start();
utf8_encode($_SESSION['tipo']);
if  (!isset($_SESSION['tipo'])) {

  header('Location:../../login.php');
}//validacion de sesion iniciada

if ($_SESSION['tipo']!='Funcionario' && $_SESSION['tipo']!='Administrador') {
  header('Location:../../login.php');
}//validacion de perfil de sesion

include_once 'conexion.php';//Conexion a la Base de datos

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
$artxpag = 7; //Se definen la cantidad de usuarios a mostrar por paginacion
$totalobtenido = $sentencia->rowCount();//Contamos la cantidad de elementos obtenidos
$paginas = $totalobtenido/$artxpag;//calculamos la cantidad de paginas a necesitar
$paginas = ceil($paginas);//Redondeamos hacia arriba para poder mostrar TODOS los elementos obtenidos


?>
<!DOCTYPE html>
<html lang="es">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Solicitudes Pendientes - Administracion SSH</title>


            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!--   El buen Bootstrap 4.3  -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> <!--   Iconos puestos en todo el sistema  -->
              
            <link rel="stylesheet" href="../cssintra/jquery.fancybox.css"> <!--   Estilos lightbox -->
            <link rel="stylesheet" href="../cssintra/estilos.css"> <!--   Estilos personalizados -->
            

            
    
    
    
</head>
<body>
<?php 
            if (!$_GET){
              header('Location:solicitudespendientes.php?pagina=1');
            } //Con esto, modificamos la cabecera para que nos envie a la pagina 1 si es que no se ha seleccionado ninguna pagina en especifico
            if ($_GET['pagina']>$paginas || $_GET['pagina']<=0 ) {

              header('Location:solicitudespendientes.php?pagina=1');
            }//Con este if, nos aseguramos que al instar manualmente numeros que no esten en el dominio de la pagina, se redirigan a la pagina 1
            $iniciar=($_GET['pagina']-1)*$artxpag;
            
            $sql_pendientes = "SELECT id_solicitud , ta_persona.rut_persona , ta_persona.nombre_persona , ta_persona.apellidop_persona , ta_fecha.fecha_asignada , ta_hora.hora_asignada ,ta_direccion.comuna_dir , ta_direccion.calle_dir , ta_direccion.numero_dir , ta_acreditadomicilio.ruta_archivo , ta_solicitud.estado_solicitud   
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
            ON ta_solicitud.fk_id_archivo = ta_acreditadomicilio.id_archivo LIMIT :iniciar, :nusuarios";  // limit, su primer parametro 
                                                                                    //indica desde que valor iniciaremos (valor del fetch), y el segundo indica
                                                                                    //en este caso, la cantidad de campos a mostrar (cantidad de filas del fetch obtenidas)
            $sentencia_pendientes = $conn->prepare($sql_pendientes);                    //preparamos la sentencia sql

            $sentencia_pendientes->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);   //Estamos convirtiendo el valor entero a String y lo pasamos como parametro a la sentencia preparada
            $sentencia_pendientes->bindParam(':nusuarios', $artxpag, PDO::PARAM_INT); //El primer parametro es el enunciado indicado en la preparacion de la sentencia, el segundo es 
                                                                                    // la variable que contiene la informacion a insertar, y el tercero, es 
                                                                                    // la funcion que transforma la variable a string.

            $sentencia_pendientes->execute();                                         //Ejecutamos la consulta sql    
            $resultado_pendientes = $sentencia_pendientes->fetchAll();                  //Se almacenan los datos obtenidos
              

     

?>
  <header>                                                                                                                            <!-- /Header-->
      <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top navsuperior" id="navv">
          
          
            <button class="btn btn-outline-info mt-1 mb-1 mr-4 " id="menu-toggle"> <!--   Boton mostrar ocultar el menu  -->
                      <i class="fas fa-chevron-left text-light" id="flechita">
                      </i> <i class="far fa-eye text-light"></i>
            </button>

            <a class="btn btn-outline-info mt-1 mr-4 mb-1 text-light" href="../index.php"><!--   Boton home  -->
                    <i class="fas fa-home"></i>
                     Home
            </a>
                
            
    
            <button class="navbar-toggler btn-outline-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon   "></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto  ">
                            <li class="nav-item">
                                  <button class="btn btn-outline-info mt-1 mr-5 mb-1 text-light" href="#"><i class="fas fa-headset"></i> Soporte</button>
                            </li>

                            <li class="nav-item dropdown mt-1">
                                  <button class="btn btn-outline-info dropdown-toggle mb-1 text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user-cog"></i> 
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right alert-info " aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item " href="#"><i class="fas fa-user-edit"></i> Informacion Personal</a>                               
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item " href="cerrar.php">
                                                    <i class="fas fa-sign-out-alt"></i> 
                                                    Cerrar Sesion
                                            </a>
                                  </div>
                            </li>
                        
                      </ul>
            </div>

          </nav>

  </header>                                                                                                                           <!-- /Header-->

      <div class=" d-flex flex-row bd-highlight" >                                                                                    <!--Contenido de la pagina  -->
         
          <article>
              <div class="bd-highlight uno" id="wrapper">

                 
                  <div class="bg-dark mt-5" id="sidebar-wrapper"> <!-- Sidebar -->
                      
                      
                          <!-- Item menu -->
          
                      <div class="list-group list-group-flush dropright ">
                          
                        <div class="linea"></div>

                        <div class="text-center text-light bg-dark mt-3">
                          
                          <h4>Administración</h4>
                        </div>
                        <div class="linea"></div>
                        <!-- Item menu -->

                        <?php if($_SESSION['tipo']=='Administrador'){ ?>

                        <div class="dropright">
                              <div class="linea"></div>
                            <a href="#" class="list-group-item list-group-item-action text-light bg-dark dropdown-toggle mt-3 mb-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>    
                            Gestion de Usuarios
                            </a>
                            
                            <div class=" dropdown-menu alert-dark " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="registrousuario.php"><i class="fas fa-user-plus"></i> Registro</a>
                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="listarusuarios.php"><i class="fas fa-users"></i> listar</a>
                            </div>
                            <div class="linea"></div>
                          </div>
                          <?php }?>
                          <!-- Item menu -->
                          <div class="dropright">
                              <div class="linea"></div>
                            <a href="#" class=" list-group-item list-group-item-action text-light bg-dark dropdown-toggle mt-3 mb-4" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path></path><polyline points="13 2 13 9 20 9"></polyline></svg>    
                            Gestion de Solicitudes
                            </a>
                            <div class=" dropdown-menu alert-dark " aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item " href="solicitudespendientes.php"><i class="far fa-calendar"></i> Pendientes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="solicitudesaprobadas.php"><i class="fas fa-calendar-check"></i> Aprobadas</a>
                                
                            </div>
                            <div class="linea"></div>
                          </div>

                                  
          
                          <!-- Item menu -->
                          <div>
                              <div class="linea"></div>

                                <a href="gestioncupos.php" class="list-group-item list-group-item-action text-light bg-dark mt-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                                <line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                  Gestion de Cupos</a>  
                              <div class="linea"></div>
                          </div>

                          <div>
                              <div class="linea"></div>
                              <div>
                                  <a href="#" class="disabled list-group-item list-group-item-action text-light bg-dark mt-5 mb-4">
                                      <i class="far fa-user"></i>
                                      <line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line>
                                      <line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                      <?php echo 'Usuario Activo:  '.utf8_encode($_SESSION['user']); ?> 
                                  </a> 
                              </div>
                          </div>
                          
                      </div> 
                    
                      
                     
                      
                  </div>     <!-- /Sidebar --> 
          </article>

          <article class="margen  container-fluid col-10">
                    <section class=" ">
                      
                            <h1 class="titulo border text-white border-warning rounded-pill mb-4">Solicitudes Pendientes</h1>
                
                        
                  
                    

                            <div class="table-responsive-xl" name="tabla">
                                  <table class="table table-dark table-bordered table-hover ">                                       <!-- Tabla con la informacion-->
                                          <caption>Listado de Solicitudes que requieren aprobacion</caption>
                                          <thead>
                                            <tr>
                                              
                                              <th scope="col">Nº Solicitud</th>
                                              <th scope="col">RUT</th>
                                              <th scope="col">Nombre</th>
                                              <th scope="col">Fecha</th>
                                              <th scope="col">Hora</th>
                                              <th scope="col">Dirección</th>
                                              <th scope="col">Archivo</th>
                                              <th scope="col">Estado</th>
                                              <th scope="col">Acción</th>

                                              
                                            </tr>
                                          </thead>
                                          <tbody>

                                                  <?php foreach($resultado_pendientes as $pend):?>
                                                    

                                                      <tr>
                                                            <th>
                                                                    <?php echo $pend['id_solicitud']   ?>
                                                            </th> 
                                                            <th>
                                                                    <?php echo $pend['rut_persona']    ?>
                                                            </th> 
                                                            <th>
                                                                    <?php echo utf8_encode($pend['nombre_persona']).' '.utf8_encode($pend['apellidop_persona']) ?>
                                                            </th> 
                                                            
                                                            <th>
                                                                    <?php echo $pend['fecha_asignada'] ?>
                                                            </th>
                                                            <th>
                                                                    <?php echo $pend['hora_asignada']; ?>
                                                            </th>
                                                            <td>
                                                                    <?php echo utf8_encode($pend['comuna_dir']).' '. utf8_encode($pend['calle_dir']).' '. $pend['numero_dir'] ?>
                                                                      </td>
                                                            
                                                            <td class="">
                                                                    <a class="btn btn-outline-warning " id="verimg" name ="imagen" data-fancybox="gallery" href="<?php echo $pend['ruta_archivo']?>">
                                                                          <i class="far fa-file-image"></i>
                                                                    </a>
                                                            </td>
                                                            <td>
                                                                    <?php echo $pend['estado_solicitud']?>
                                                            </td>
                                                            <td class="">
                                                                    <a onclick="return rechazar()" class="btn btn-outline-success "  href="#" >
                                                                        <i class="far fa-calendar-check"></i>
                                                                    </a>

                                                                    <a class="btn btn-outline-danger " href="procesarechazosolicitud.php?id=<?php echo $pend['id_solicitud']; ?>" id="confirm">
                                                                          <i class="far fa-calendar-times"></i>
                                                                    </a>
                                                            </td>
                                                      </tr>
                                                      

                                                  <?php endforeach?> 
                                            
                                          </tbody>
                                  </table>                                                                                           <!-- /Tabla con la informacion-->
                            </div>
                    
                      
                      <nav aria-label="Page navigation example ">                                                                    <!-- menu de navegacion entre paginas-->

                              <ul class="pagination ">
                                      <li class="page-item <?php  echo$_GET['pagina']<=1 ? 'disabled' : '' ?> " >
                                              <a class="page-link " href="solicitudespendientes.php?pagina=<?php echo $_GET['pagina']-1 ?>">
                                                  Anterior
                                              </a>
                                      </li>
                                      <!-- Paginacion dinamica-->
                                    
                                      <?php  for ($i=0; $i < $paginas; $i++):?>

                                      <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>">
                                              <a class="page-link " href="solicitudespendientes.php?pagina=<?php echo $i+1 ?>">
                                                  <?php echo$i+1; ?>
                                              </a>
                                      </li>

                                      <?php  endfor?>

                                      <!-- Paginacion dinamica-->

                                      <li class="page-item <?php  echo$_GET['pagina']>=$paginas ? 'disabled' : '' ?> ">
                                              <a class="page-link " href="solicitudespendientes.php?pagina=<?php echo $_GET['pagina']+1 ?>">
                                                  Siguiente
                                              </a>
                                      </li>
                              </ul>
                      
                      </nav>                                                                                                        <!-- /menu de navegacion entre paginas-->
                      
                    </section>
          </article>


      </div> <!--/todo aqui denshro -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../jsintra/jquery.fancybox.js" charset="utf-8"></script>    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--   Alertas   -->
   
    <script type="Text/javascript">
                     /*  $("#linku").click(function(e) {
                                e.preventDefault(); // Prevent the href from redirecting directly
                                var linkURL = $(this).attr("href");
                                rechazah(linkURL);
                        });

                        function rechazah(linkURL) {
                                swal({
                                        title: "Leave this site?", 
                                        text: "If you click 'OK', you will be redirected to " + linkURL,
                                        showCancelButton: true,
                                        type: "warning"
                                }, function(linku){
                                if(linku){
                                        console.log('confirmado');
                                        window.location.href = linkURL;
                                }else{
                                        console.log('cancelado');
 
                                }
                                })
                        }*/
                        $("#confirm").click(function(e) {
                                e.preventDefault(); // Prevent the href from redirecting directly
                                var linkURL = $(this).attr("href");
                                warnBeforeRedirect(linkURL);
                                });

                                function warnBeforeRedirect(linkURL) {
                                swal({
                                        title: "Are you sure?",
                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                                                                
                                }).then(function(result) {
                                        console.log(linkURL);
                                console.log(result);
                                
                                if (result != null) {
                                        window.location.href = linkURL;
                                        console.log('aceptado');
                              
                                }else{
                                        swal({
                                         title: "Gestion Cancelada!",
                                        });
                                       
                                        console.log('cancelado');

                                }
                                });
                                }
                     
                        
    </script>

   
   
   
    <script>
      $("#menu-toggle").click(function(e){
        e.preventDefault();

        $("#wrapper").toggleClass("toggled");

        $("#flechita").toggleClass("fa-chevron-right");
       
        $("#headermenulateral").toggleClass("d-none");
       });
    </script>
   
   <?php  $sentencia_pendientes=null;
   $conn=null;
    ?>
</body>
</html>
