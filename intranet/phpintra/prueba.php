<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion SSH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/funciones.js"></script>
    
</head>
<body>
    <header >
       
    </header>
    
    <div class="container ">

        <form action="procesaregistro.php" method="POST">
            <div class="form-group">
                    <input type="form-item" name="rutnuevo" value="" placeholder="rut">
                    <input type="text" name="nombrenuevo" value="" placeholder="nombre">
                    <input type="text" name="correonuevo" value="" placeholder="correo">
                    <input type="text" name="passnuevo" value="" placeholder="contraseña">
                    <select name="tiponuevo">
                        <option value="Administrador">Administrador</option>
                        <option value="Funcionario">Funcionario</option>
                    </select>
            </div>
            <button class="btn btn-dark" type="submit">Send</button>
        </form>

        <form action="procesalogin.php" method="POST">
                <div class="form-group">
                        <input type="form-item" name="rutlog" value="" placeholder="rut">
                        <input type="password" name="passlog" value="" placeholder="contraseña">
                        
                </div>
                <button class="btn btn-dark" type="submit">Send</button>
            </form>


    </div>

    <footer>
    </footer>
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
