<?php
session_start();
utf8_encode($_SESSION['tipo']);
if  (!isset($_SESSION['tipo'])) {

  header('Location:../../login.php');
}//validacion de sesion iniciada
if ($_SESSION['tipo']=='Funcionario') {
  header('Location:../../login.php');
}//validacion de perfil de sesion

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Usuarios - Administracion SSH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--   Estilos personalizados -->
    <link rel="stylesheet" href="../cssintra/estilos.css">
    <script src="../jsintra/funciones.js" charset="utf-8"></script>
    <script src="../../js/validarut.js" charset="utf-8"></script>
</head>
<body>

  <header>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top navsuperior" id="navv">
          
          
            <button class="btn btn-outline-info  mb-1 mr-4 " id="menu-toggle"><i class="fas fa-chevron-left text-light" id="flechita"></i> <i class="far fa-eye text-light"></i></button>

            <li class="nav-item">
                <a class="btn btn-outline-info mt-1 mr-4 mb-1 text-light" href="../index.php"><i class="fas fa-home"></i> Home</a>
                
            </li>
    
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
                    <a class="dropdown-item " href="cerrar.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
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
                                <a class="dropdown-item " href="listarusuarios.php"><i class="fas fa-user-plus"></i> Registro</a>
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
              
               <form action="procesaregistro.php" method="POST" class="" name="form1">
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><h4>Informacion Personal</h4></label>
                    </div>
                    <!-- Separador de campos -->

                    <div class="form-group row">
                        <label for="inputRut" class="col-sm-2 col-form-label"><b>RUT</b></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="rut" id="inputRut" required placeholder="Rut sin puntos ni guion (112223334)" onblur="javascript:Rut(document.form1.rut.value)">
                        </div>
                    </div>
                    <!-- Separador de campos -->
                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-2 col-form-label"><b>Nombre</b></label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputNombre" required name="nombrenuevo" placeholder="Nombre/s">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputApellidoP" required name="apellidopnuevo" placeholder="Apellido Paterno">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputApellidoM" required name="apellidomnuevo" placeholder="Apellido Materno">
                        </div>

                    </div>
                   
                     <!-- Separador de campos -->
                    <div class="form-group row">
                            <label for="inputCorreo" class="col-sm-2 col-form-label"><b>Correo Electronico</b></label>
    
                            <div class="col-sm-10">
                                <input type="email" name="correonuevo" class="form-control" id="inputCorreo" required placeholder="Correo">
                            </div>
                    </div>
                     <!-- Separador de campos -->
                     <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"><h4>Informacion de la Cuenta</h4></label>
                    </div>

                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"><b>Contraseña</b></label>
    
                            <div class="col-sm-5">
                                <input type="password" name="passnuevo" class="form-control" required id="inputPassword" placeholder="Contraseña">
                            </div>
                             
                            <div class="col-sm-5">
                                    <input type="password" name="passnuevo2" required class="form-control" id="inputPassword2" placeholder="Confirma tu Contraseña">
                                </div>
                    </div>

                    <!-- Separador de campos -->
                            
                    <div class="form-group row">
                            <label for="inputtipo" class="col-sm-2 col-form-label"><b>Tipo de Usuario</b></label>
    
                            <div class="col-sm-10">
                                <select class="form-control" name="tiponuevo" id="selecttipo">
                                        <option value="Funcionario" >Funcionario</option>
                                        <option value="Administrador" >Administrador</option>
                                </select>
                            </div>
                    </div>
                    
                        
                    
                    <div class="">
                        <button type="submit" class="btn btn-success mb-2 float-right">Confirmar Registro</button>
                        
                    </div>
               </form>
                   
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