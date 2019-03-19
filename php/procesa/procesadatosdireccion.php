<?php
session_start();
$comuna = $_POST['comunas'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$otro = $_POST['otro'];//otro
//$id = $_SESSION['id_persona'];
$region = 16;
echo '<br>Comuna: ' ;
echo $comuna ;
echo '<br>Calle: ' ;
echo $calle ;
echo '<br>Numero: ' ;
echo $numero ;
echo '<br>Otro: ' ;
echo $otro ;
echo '<br>Id persona: ' ;
echo $_SESSION['id_persona'] ;
echo '<br>Id Region: ' ;
echo $region ;