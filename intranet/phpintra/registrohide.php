<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <form action="nivel3/procesaregistro.php" method="POST" class="form-signin" name="form1">
                    
                    <div class="form-group row ">
                        <label for="" class="col-sm-12 col-form-label"><h4><b>Informacion Personal</b></h4></label>
                    </div>
                    <!-- Separador de campos -->
                    <div class="form-group row">
                        <label for="inputRut" class="col-sm-12 col-form-label"><b>RUT</b></label>
                        
                        <div class="col-sm-5">
                              <input type="text" class="form-control text-dark" name="rut" id="inputRut" required placeholder="11222333-4" onblur="javascript:Rut(document.form1.rut.value)">
                        </div>
                    </div>
                    <!-- Separador de campos -->
                       
                      
                      <div class="form-group row">
                       <label for="inputRut" class="col-sm-12 col-form-label"><b>Nombre</b></label>

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
                    <label for="inputRut" class="col-sm-12 col-form-label"><b>Correo Electronico</b></label>
                            <div class="col-sm-10">
                                <input type="email" name="correonuevo" class="form-control" id="inputCorreo" required placeholder="Correo">
                            </div>
                    </div>
                    <br>
                     <!-- Separador de campos -->
                     <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label"><h4><b>Informacion de la Cuenta</b></h4></label>
                            
                    </div>
                    
                    <div class="form-group row">
                    <label for="inputRut" class="col-sm-12 col-form-label"><b>Contraseña</b></label>
    
                            <div class="col-sm-5">
                                <input type="password" name="passnuevo" class="form-control" required id="inputPassword" placeholder="Contraseña">
                            </div>
                    </div>   
          
               
                    <div class="form-group row">
                    <label for="inputRut" class="col-sm-12 col-form-label"><b>Repetir Contraseña</b></label>
                          <div class="col-sm-5">
                              <input type="password" name="passnuevo2" required class="form-control" id="inputPassword2" placeholder="Confirma tu Contraseña">
                          </div>
                    </div>

                    <!-- Separador de campos -->
                    
                    <div class="form-group row">
                    <label for="inputRut" class="col-sm-12 col-form-label"><b>Tipo de Usuario</b></label>       
    
                            <div class="col-sm-10">
                                <select class="form-control" name="tiponuevo" id="selecttipo">
                                        <option value="Funcionario" >Funcionario</option>
                                        <option value="Administrador" >Administrador</option>
                                </select>
                            </div>
                    </div>
                    
                        
                    
                    <div class="">
                      <br>
                        <button type="submit" class="btn btn-success mb-2 float-left">Confirmar Registro</button>
                        
                    </div>
               </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>