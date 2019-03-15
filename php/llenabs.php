<?php
include_once '../intranet/phpintra/conexion.php'; 

$array = array(
    
    "Región de Arica y Parinacota" ,
    "Región de Tarapacá",
    "Región de Antofagasta",
    "Región de Atacama",
    "Región de Coquimbo",
    "Región de Valparaíso",
    "Región del Libertador Gral. Bernardo O’Higgins",
    "Región del Maule",
    "Región del Biobío",
    "Región de la Araucanía",
    "Región de Los Ríos",
    "Región de Los Lagos",
    "Región de Aisén del Gral. Carlos Ibáñez del Campo",
    "Región de Magallanes y de la Antártica Chilena",
    "Región Metropolitana de Santiago",
    
);

$arica = array(
    "Iquique", 
    "Alto Hospicio", 
    "Pozo Almonte", 
    "Camiña", 
    "Colchane", 
    "Huara", 
    "Pica"
);

foreach ($array as $reg) {

$consulta_llenarregiones = 'INSERT INTO Ta_region(nombre_region) 
                            VALUES (?)';

$sentencia_insert = $conn->prepare($consulta_llenarregiones);
$sentencia_insert->execute(array(utf8_decode($reg)));

}


$sql = "SELECT * FROM ta_region";

$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos
$sentencia->execute();            // Ejecutamos la consulta
$resultado = $sentencia->fetchAll(); //Obtenemos los datos
$cont = 0;


foreach ($resultado as $reg) {
    
}
















