<?php



function getlistacomunas(){
    include_once '../../intranet/phpintra/conexion.php'; 
    $id_region = $_POST['id_region'];

$consulta = 'SELECT * FROM ta_comuna where fk_id_region = ?';

$sentencia_listarcomuna = $conn->prepare($consulta);
$sentencia_listarcomuna->execute($id_region); 
$resultado_listarcomuna = $sentencia_listarcomuna->fetchAll(); //Obtenemos los datos
$lista = $lista = '<option value="0">Selecciona una Comuna</option>';

    
    foreach ($resultado_listarcomuna as $comuna) {
        $lista .="<option value='$comuna[id_comuna]'>$comuna[nombre_comuna]</option>";

    }

    return $lista;
}
echo getlistacomunas();