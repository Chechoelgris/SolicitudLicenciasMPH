<?php



if (isset($_SESSION['fallaemail'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hay un problema con el correo ingresado.</h5>';
    unset($_SESSION['fallaemail']);
}else{
       
}

if (isset($_SESSION['fallaupdate'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hubo un problema al actualizar su información.</h5>';
    unset($_SESSION['fallaupdate']);
}else{
    
    
}

if (isset($_SESSION['fallainsert'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hubo un problema al ingresar su información.</h5>';
    unset($_SESSION['fallainsert']);
}else{
    
    
}

if (isset($_SESSION['fallalongitud'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Ha ingresado una cantidad de caracteres no válida.</h5>';
    unset($_SESSION['fallalongitud']);
}else{
   
    
}

if (isset($_SESSION['vacios'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Uno o mas campos se enviaron vacíos.</h5>';
    unset($_SESSION['vacios']);
}else{
    
    
}


if (isset($_SESSION['existe'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Ya hay una solicitud pendiente asociada a su rut.</h5>';
    unset($_SESSION['existe']);
}else{
    
    
}


if (isset($_SESSION['nohaaycupos'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* No hay cupos disponibles para la fecha seleccionada.</h5>';
    unset($_SESSION['existe']);
}else{
    
    
}

if (isset($_SESSION['noesfecha'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Debes seleccionar la fecha desde la lsita desplegable o escribirla respetando su formato.</h5>';
    unset($_SESSION['noesfecha']);
}

