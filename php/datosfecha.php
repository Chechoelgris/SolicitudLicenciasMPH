<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script></script>
    <link rel="stylesheet" href="../css/nivel1.css">


    <title>Fecha de Solicitud!</title>
  </head>
  <body>
   <header>
   
   </header>

        <div class="container">
                                <div class="barra">
                                                    <div class="progress">
                                                            <div class="determinate" style="width: 80%"></div>
                                                    </div>
                                </div>

                                <br>

                                <form name="" id="formu" class="mt-5" action="procesa/procesafecha.php"  method="POST">

                            

                                                <h1 class="h2 mb-4 mt-1 font-weight-normal">Fecha de Exámenes</h1>

                                                <small> Felicidades, solo nos queda este punto para finalizar. Selecciona un dia para asignar tu Solicitud.</small>
                                                <br>
                                                <br>

                                                <div class="form-group">
                                                                
                                                               
                                                                <!-- Separador de campos -->
                                                                <div class="row">    
                                                                        <div class="input-field col s12">
                                                                                <input type="date" class="input-oscuro" name="fechasolicitada" id="fechasolicitada" placeholder="" min="2018-01-01" required
                                                                                >
                                                                                <label for="fechasolicitada">Fecha Solicitada </label>
                                                                                <span class="abajito" data-error="wrong" data-success="right">Se desplegará un menú cuando haga click</span>
                                                                        </div>        
                                                                </div> 
                                                                 <!-- Separador de campos -->
                                                                 
                                                              
                                                                 <div class="row">    
                                                                        <div class="input-field col s12">
                                                                                <input type="text" name="cuposdisponibles" id="cuposdisponibles" class="input-oscuro"  required="" autofocus
                                                                                placeholder="1" readonly>
                                                                                <label for="cuposdisponibles">Cupos Disponibles</label>
                                                                                <span class="abajito" data-error="wrong" data-success="right">Un nombre es suficiente</span>
                                                                        </div>        
                                                                </div>
                                                              
                                                </div>
                                                               
                                                <br>
                                                <button class="button mt-3 mb-4" id=""  type="submit" >
                                                            Enviar Solicitud
                                                            <div class="button__horizontal"></div>
                                                            <div class="button__vertical"></div>
                                                </button>
                                                <br>
                                                <small class="">Perfecto!, da click en <b>"Enviar Solicitud"</b> para confirmar.</small>

                                                <div class="row">
                                                            <div class="input-field col s12">
                                                                        <?php include("procesa/imprvalidacion.php"); ?>
                                                            
                                                            </div>
                                                </div>
                                </form>
        </div>


   <footer>
   </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
  
    <script>
             $(document).ready(function(){
                $('select').formSelect();
                var cuposd=1;

                $('#fechasolicitada').click(function(e){
                        
                        cuposd++;

                        $("#cuposdisponibles").attr("placeholder", cuposd);

                       

                        
                        
                });
        });
    </script>

</body>
</html>


