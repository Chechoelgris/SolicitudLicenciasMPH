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


    <title>Acceso a la solicitud!</title>
  </head>
  <body>
   <header>
   
   </header>
   
      

          <form name="form1" id="formu" class="form-signin text-center mt-5" action="procesa/procesainiciosolicitud.php"  method="POST">

            <h1 class="h1 mb-4 mt-1 font-weight-normal">¡ Bienvenido !</h1>
            <small class="">Para comenzar, necesitamos saber quien eres. </small>
            <br>
            <small class="">Por favor, ingresa tu RUT para continuar. </small>
           

            <div class="row">    
                      <div class="input-field col s12">
                                <input type="text" name="rut" id="inputRut" required="" onblur="javascript:Rut(document.form1.rut.value)" class="input-oscuro"autofocus>
                                <label for="rut">RUT</label>
                                <span class="abajito" data-error="wrong" data-success="right">Sin puntos ni guión.</span>
                      </div>        
            </div>
            
            <button class="button mt-3" id="" type="submit" >
                          Ingresar
                          <div class="button__horizontal"></div>
                          <div class="button__vertical"></div>
            </button>
            <br>
            <br><br>
            
    </form>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
  </body>
</html>