<?php

include_once 'conexion.php';
$sql = 'SELECT * FROM articulos';
$sentencia = $conn->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();
//var_dump($resultado);

$artxpag = 4;
//contar articulos de nuestra DB
$totalobtenido = $sentencia->rowCount();
//echo "$totalobtenido <br>";
$paginas = $totalobtenido/4;
$paginas = ceil($paginas);//ceil redondea hacia arroba, nos sirve para saber cuantas paginas necesitamos
echo $paginas;
?>


<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container my-5">
        <h1 class="mb-5">paginacion</h1>

      <?php  if (!$_GET) {
        header('Location:index.php?pagina=1');
      } 
      if ($_GET['pagina']>$paginas || $_GET['pagina']<=0 ) {

        header('Location:index.php?pagina=1');
      }

      $iniciar=($_GET['pagina']-1)*$artxpag;
      



      $sql_articulos = 'SELECT * FROM articulos LIMIT :inicar,:narticulos';
      $sentencia_articulos = $conn->prepare($sql_articulos);
      $sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
      $sentencia_articulos->bindParam(':narticulos', $artxpag, PDO::PARAM_INT);
      $sentencia_articulos->execute();
      $resultado_articulos = $sentencia_articulos->fetchAll();  

      ?>



    <?php  foreach($resultado_articulos as $articulo): ?>
        
        <div class="alert alert-info" role="alert">
          <?php echo $articulo['titulo'] ?>
        </div>
    <?php endforeach ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item
             <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>
             ">

              <a class="page-link " 
              href="index.php?pagina=<?php echo $_GET['pagina']-1?>" 
              aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <?php for ($i=0; $i<$paginas ; $i++): ?>
              
                 <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':''?>">
                  <a class="page-link" href="index.php?pagina=<?php echo $i+1 ?>">
                    <?php  echo $i+1; ?>
                    
                  </a>
                </li>

            <?php  endfor ?>
           
            <li class="page-item
            <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
              <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1?>" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>

    </div>
  </body>
</html>