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
                                    <div class="determinate" style="width: 10%"></div>
                            </div>
                    </div>
                    <form name="form1" id="formu" class="mt-5" action="iniciosolicitud.php"  method="POST">
            
                            <h1 class="h2 mb-4 mt-1 font-weight-normal">Datos Personales</h1>

                            <small>Queremos conocerte, por favor, completa estos datos para continuar.</small>
                            <br>

                            <div class="form-group">
                                <p class="label">RUT</p>
                                <input type="text" name="rut"  id="inputRut" required="" onblur="javascript:Rut(document.form1.rut.value)" class=" input-oscuro" placeholder="11111111-1"  autofocus="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                               
                                <p class="label">Nombre</p>
                                <input type="text" class="input-oscuro" placeholder="Su nombre" required="" x-moz-errormessage="Por favor, especifique una dirección de correo válida.">
                                
                                <p class="label">Apellido Paterno</p>
                                <input type="text" class="input-oscuro" placeholder="Su Apellido Paterno">

                                <p class="label">Apellido Materno</p>
                                <input type="text" class="input-oscuro" placeholder="Su Apellido Materno">

                                <p class="label">Fecha de Nacimiento</p>
                                <input type="date" class="input-oscuro" placeholder="" min="1919-01-01">

                                <p class="label">Sexo</p>
                                <div class="input-field col-6">
                                        <select required>
                                          <option value="" disabled selected>Elije una Opcion</option>
                                          <option value="No Especifica">Prefiero no decir</option>
                                          <option value="Femenino">Femenino</option>
                                          <option value="Masculino">Masculino</option>
                                        </select>
                                      </div>
                                <select required >
                                        
                                        
                                        
                                </select> 
                              
                            </div>




                            <br>

                            
                            <button class="button mt-3 mb-4" id=""  type="submit" >
                                        Continuar
                                        <div class="button__horizontal"></div>
                                        <div class="button__vertical"></div>
                            </button>
                            <br>
                            <small class="">Tranquilo, son solo unos pocos datos, y solo los pediremos <b>una vez</b>.</small>

                        
                    </form>
            </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>