
<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=paginacion_1','root' , '');
    //echo "conectado";
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
