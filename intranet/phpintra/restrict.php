<?php 
session_start();

if ( isset($_SESSION['user']) ) {

 echo 'Bienvenido '.utf8_encode($_SESSION['user']);
 echo '<br> <a href="cerrar.php">Cerrar Sesion</a>';
}else {
    header('Location:prueba.php');
}
