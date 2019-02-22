<?php
session_start();

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
          
          
            <button class="btn btn-outline-info  mb-1 mr-4" id="menu-toggle"><i class="fas fa-chevron-left" id="flechita"></i> Menu</button>
            
            <ul class="navbar-nav ml-auto  ">
              <li class="nav-item text-light" >
                    <h6><?php echo 'Bienvenido! '.utf8_encode($_SESSION['user']); ?> </h6>
              </li>
            </ul>
              
         
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto  ">
                
                <li class="nav-item">
                  <button class="btn btn-outline-info mr-5 mb-1 " href="#">Soporte</button>
                </li>
               
               
                <li class="nav-item dropdown ">
                  <button class="btn btn-outline-info dropdown-toggle  mb-1 " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sesion
                  </button>
                  <div class="dropdown-menu dropdown-menu-right alert-info " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="#">Informacion Personal</a>
                    <a class="dropdown-item " href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="phpintra/cerrar.php">Cerrar Sesion</a>
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>

  </header>

      <div class=" d-flex flex-row bd-highlight" > <!--todo aqui denshro -->
       
          <article>
              <div class="bd-highlight " id="wrapper">

                 
                  <div class="bg-dark mt-5" id="sidebar-wrapper"> <!-- Sidebar -->
                      
                      
                          <!-- Item menu -->
          
                      <div class="list-group list-group-flush dropright ">
                          
                        <div class="linea"></div>
                        <h4 class="navbar-brand col-sm-2 col-md-2 mr-0 text-light text-center" id="headermenulateral" >Administración</h4>
                          <a href="#" class="list-group-item list-group-item-action text-light bg-dark dropdown-toggle mt-3 mb-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>    
                          Gestion de Usuarios
                          </a>
                          
                          <div class=" dropdown-menu alert-dark " aria-labelledby="navbarDropdown">
                              <a class="dropdown-item " href="#">Registro</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item " href="#">Editar / Eliminar</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item " href="#">listar</a>
                          </div>
          
                          <!-- Item menu -->
                          <a href="#" class="list-group-item list-group-item-action text-light bg-dark mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                           Gestion de Solicitudes</a>
          
          
                          <!-- Item menu -->
                          <a href="#" class="list-group-item list-group-item-action text-light bg-dark mb-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                           
                            Gestion de Cupos</a>  
                      </div>      
                  </div>     <!-- /Sidebar --> 
          </article>
          <section>
              <div class="container margen">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                    elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                    voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                    commodi nesciunt delectus repellat mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                        elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                        voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                        commodi nesciunt delectus repellat mollitia?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                            elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                            voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                            commodi nesciunt delectus repellat mollitia?</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                commodi nesciunt delectus repellat mollitia?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                    elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                    voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                    commodi nesciunt delectus repellat mollitia?</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                        elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                        voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                        commodi nesciunt delectus repellat mollitia?</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                            elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                            voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                            commodi nesciunt delectus repellat mollitia?</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                                elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                                voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                                commodi nesciunt delectus repellat mollitia?</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                                    elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                                    voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                                    commodi nesciunt delectus repellat mollitia?</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                                        elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                                        voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                                        commodi nesciunt delectus repellat mollitia?</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                                            elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                                            voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                                            commodi nesciunt delectus repellat mollitia?</p>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing 
                                                                elit. Asperiores dolorem consequuntur, accusamus quo doloribus 
                                                                voluptatum quae cum at facilis hic recusandae aperiam nam eius sunt 
                                                                commodi nesciunt delectus repellat mollitia?</p>
              </div>
          </section>
         





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