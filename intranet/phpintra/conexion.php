<?php 
$link='mysql:host=localhost;dbname=solicitudrenovacion';
$usuario='root';
$pass='';
    try {
        $conn = new PDO($link, $usuario, $pass);
        //echo 'Conectado <br>';
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }