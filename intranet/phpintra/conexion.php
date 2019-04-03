<?php 
$link='mysql:host=127.0.0.1;dbname=sergfswd_solicitudrenovacion';
$usuario='sergfswd_sergfswd';
$pass='checho1994';
    try {
        $conn = new PDO($link, $usuario, $pass);
        //echo '<br>Conectado a la base de datos<br>';
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }