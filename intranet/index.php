<?php
session_start();
utf8_encode($_SESSION['tipo']);


  if  (!isset($_SESSION['tipo'])) {

      header('Location:../login.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion SSH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--   Estilos personalizados -->
    <link rel="stylesheet" href="cssintra/estilos.css">
    <script src="jsintra/funciones.js" charset="utf-8"></script>
    
</head>
<body>

  <header>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top navsuperior" id="navv">
          
          
            <button class="btn btn-outline-info  mb-1 mr-4 mt-1" id="menu-toggle"><i class="fas fa-chevron-left text-light" id="flechita"></i> <i class="far fa-eye text-light"></i></button>
           
                  <a class="btn btn-outline-info mt-1 mr-4 mb-1 text-light" href="index.php"><i class="fas fa-home"></i> Home</a>
           
            
              
         
    
            <button class="navbar-toggler btn-outline-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="dropdown-item " href="phpintra/cerrar.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>

  </header>

      <div class=" d-flex flex-row bd-highlight" > <!--todo aqui denshro -->
         
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
                                <a class="dropdown-item " href="phpintra/registrousuario.php"><i class="fas fa-user-plus"></i> Registro</a>
                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="phpintra/listarusuarios.php"><i class="fas fa-users"></i> listar</a>
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
                                <a class="dropdown-item " href="#"><i class="far fa-calendar"></i> Pendientes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="#"><i class="fas fa-calendar-check"></i> Aprobadas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="#"><i class="fas fa-calendar-times"></i> Rechazadas</a>
                            </div>
                            <div class="linea"></div>
                          </div>

                                  
          
                          <!-- Item menu -->
                          <div>
                              <div class="linea"></div>
                            <a href="#" class="list-group-item list-group-item-action text-light bg-dark mt-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                             
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

          <article class="mr-4 ml-4 row ">
            <section class="margen">
              
                <div class="p-block">
                
                    <div class="accordion col-12" id="accordionExample">
                        <div class="card">
                          <div class="card-header alert-dark" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-outline-dark btn-lg btn-block " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Gestión de Usuarios
                              </button>
                            </h2>
                          </div>
                      
                          <div id="collapseOne" class="collapse show alert-info" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>En este modulo, se gestionan los usuarios que tendran acceso al sistema de administracion, este 
                                    apartado esta compuesto por tres secciones, las que se detallaran a continuacion.</p>
                                    
                                    <h5><b>Registro de Usuarios</b></h5>
                                    <p>En esta seccion, el o los administradores, podran hacer el ingreso de nuevos usuarios, otorgandole los permisos 
                                      necesarios, segun sus funciones al momento de crearlos, por medio de una opcion que requiere 
                                      seleccionar un tipo de perfil para su creacion.</p>
                                    <h5><b>Editar / Eliminar</b></h5>
                                    <p>Esta seccion permite la busqueda de usuarios registrados en la base de datos, modificarlos y/o eliminarlos 
                                      del sistema.</p>
                                    <h5><b>Listar</b></h5>
                                    <p>Listar le permitira acceder de manera rapida y efectiva, a todos los registros de usuarios en la base.</p>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header alert-dark" id="headingTwo">
                            <h2 class="mb-0">
                              <button class="btn btn-outline-dark  collapsed btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Gestión de Solicitudes
                              </button>
                            </h2>
                          </div>
                          <div id="collapseTwo" class="collapse alert-info " aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>En este modulo, se gestionan las solicitudes de horas ingresadas al sistema por los vecinos, al igual que el
                                    anterior, este apartado consiste en tres secciones, las que se detallaran a continuacion.
                                  </p>
                                  
                                  <h5><b>Pendientes</b></h5>
                                  <p>En la seccion "Pendientes", se concentran las solicitudes ingresadas al sistema, que aún no han sido
                                    asignadas a la hora solicitada, permite validar la informacion necesaria para aceptar o rechazar 
                                    las solicitudes.
                                  </p>
          
                                  <h5><b>Aprobadas</b></h5>
                                  <p>Esta seccion permite acceder de manera rapida y efectiva, a todas las solicitudes que han sido 
                                    validadas y aprobadas en el modulo anterior.</p>
          
                                  <h5><b>Rechazadas</b></h5>
                                  <p>Esta seccion permite acceder de manera rapida y efectiva, a todas las solicitudes que han sido 
                                      validadas, y en consecuencia, rechachadas en el modulo anterior.</p>   
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header alert-dark" id="headingThree">
                            <h2 class="mb-0">
                              <button class="btn btn-outline-dark collapsed btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Gestión de Cupos
                              </button>
                            </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body alert-info">
                                <p>Esta sección nos permite administrar de manera dinamica los cupos de atencion totales 
                                    para un dia en especifico.</p> 
                            </div>
                          </div>
                        </div>
                      </div>

                  

                   

                    <div class="cupos colapse d-none" id="multiCollapseExample3">
                        <h4>Gestión de Cupos</h4>
                        <p>Esta sección nos permite administrar de manera dinamica los cupos de atencion totales 
                          para un dia en especifico.</p>
                    </div>

                  </div>

            </section>
            
          </article>





      </div> <!--/todo aqui denshro -->








            
            
    


  
    

  




    
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $("#menu-toggle").click(function(e){
        e.preventDefault();

        $("#wrapper").toggleClass("toggled");

        $("#flechita").toggleClass("fa-chevron-right");
       
        $("#headermenulateral").toggleClass("d-none");

        
        
    });
    </script>
    
</body>
</html>