<?php 
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
    <script src="../js/validarut.js"></script>
   
    <link rel="stylesheet" href="../css/nivel1.css">


    <title>Datos Personales!</title>
  </head>
  <body>
   <header>
   
   </header>
   
      
            <br>
            <div class="container">
                    <div class="barra">
                            <div class="progress">
                                    <div class="determinate" style="width: 20%"></div>
                            </div>
                    </div>
                    <form name="form1" id="formu" class="mt-5" action="procesa/procesadatospersonales.php"  method="POST">

                            

                            <h1 class="h2 mb-4 mt-1 font-weight-normal">Datos Personales</h1>

                            <small>Queremos conocerte, por favor, completa estos datos para continuar.</small>
                            <br>

                            <div class="form-group">

                               

                                <div class="row">    
                                        <div class="input-field col s12">
                                                <input type="text" name="ingresonombre" class="input-oscuro"  required="" autofocus
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['nombre_obtenido']);
                                                }?>" >
                                                <label for="ingresonombre">Nombre</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Un nombre es suficiente</span>
                                        </div>        
                                </div>
                                <!-- Separador de campos -->
                                <div class="row">    
                                        <div class="input-field col s12">
                                                <input type="text" name="ingresapellidop" class="input-oscuro"  required=""
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['apellidop_obtenido']);
                                                }?>" >
                                                <label for="ingresapellidop">Apellido Paterno</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Primer apellido</span>
                                        </div>        
                                </div>

                                <!-- Separador de campos -->

                                <div class="row">    
                                        <div class="input-field col s12">
                                                <input type="text" name="ingresapellidom" class="input-oscuro" required=""
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['apellidom_obtenido']);
                                                        }?>" >
                                                <label for="ingresapellidom">Apellido Materno</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Segundo apellido</span>
                                        </div>        
                                </div>       
                                <!-- Separador de campos -->
                                <div class="row">    
                                        <div class="input-field col s12">
                                                <input type="date" class="input-oscuro" name="fechanacimiento" placeholder="" min="1919-01-01" required
                                                >
                                                <label for="fechanacimiento">Fecha de Nacimiento</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Se desplegará un menú cuando haga click</span>
                                        </div>        
                                </div> 

                                <!-- Separador de campos -->
                                <div class="row">    
                                        <div class="input-field col s12">
                                        <label for="sexo">Sexo</label>
                                        <p>
                                                        <label>
                                                          <input name="sexo" type="radio" value="No Especifica" <?php if ($_SESSION['encontrado']) {
                                                                if($_SESSION['sexo_obtenido']=='No Especifica'){
                                                                        echo 'checked';
                                                                }
                                                                
                                                                }?>  />
                                                          <span>Prefiero no decir</span>
                                                        </label>
                                                      </p>
                                                      <p>
                                                        <label>
                                                          <input name="sexo" type="radio" value="Femenino" <?php if ($_SESSION['encontrado']) {
                                                                if($_SESSION['sexo_obtenido']=='Femenino'){
                                                                        echo 'checked';
                                                                }
                                                                
                                                                }?> />
                                                          <span>Femenino</span>
                                                        </label>
                                                      </p>
                                                      <p>
                                                        <label>
                                                          <input class="with-gap" name="sexo" type="radio" value="Masculino" <?php if ($_SESSION['encontrado']) {
                                                                if($_SESSION['sexo_obtenido']=='Masculino'){
                                                                        echo 'checked';
                                                                }
                                                                
                                                                }?> />
                                                          <span>Masculino</span>
                                                        </label>
                                                      </p>
                                                
                                                
                                                <span class="abajito" data-error="wrong" data-success="right">Indique su sexo.</span>
                                        </div>        
                                </div> 
                                <!-- Separador de campos -->
                                <br>
                                <h1 class="h2 mb-4 mt-1 font-weight-normal">Contacto</h1>
                                <small>Esta información es muy importante, si necesitamos contactarte, lo haremos usando estos datos.</small>
                                <br>
                                <!-- Separador de campos -->

                                 <div class="row">    
                                         <div class="input-field col s12">
                                                              

                                                <input name="email" id="email" type="email" class="input-oscuro "  required
                                                value=" <?php if ($_SESSION['encontrado']) {
                                                        echo utf8_encode($_SESSION['correo_obtenido']);
                                                        }?>" >
                                                <label for="email">Email</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Su correo actualizado</span>
                                         </div>        
                                </div> 
                               
                               <!-- Separador de campos -->

                               <div class="row">    
                                        <div class="input-field col s12 ">
                                                        

                                                <input name="telefono" id="telefono" type="tel" class="input-oscuro"  required
                                                value="<?php if ($_SESSION['encontrado']) {
                                                        echo $_SESSION['telefono_obtenido'];
                                                        }else{
                                                                echo '+56';   
                                                        }?>" >
                                                <label for="telefono">Teléfono</label>
                                                <span class="abajito" data-error="wrong" data-success="right">Desde el 9 en adelante  </span>
                                        </div>        
                               </div> 

                                
                                                    
                               
                              
                            </div>




                            <br>

                            
                            <button class="button mt-3 mb-4" id=""  type="submit" >
                                        Continuar
                                        <div class="button__horizontal"></div>
                                        <div class="button__vertical"></div>
                            </button>
                            <br>
                            <small class="">Tranquilo, son solo unos pocos datos, y solo los pediremos <b>una vez</b>. Tu proxima visita cargará estos datos automaticamente.</small>

                            <div class="row">
                                        <div class="input-field col s12">
                                                       <?php include("procesa/imprvalidacion.php"); ?>
                                        
                                        </div>
                            </div>
                    </form>
            </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
   
    <script>
             $(document).ready(function(){
                $('select').formSelect();
        });
    </script>
</body>
</html>