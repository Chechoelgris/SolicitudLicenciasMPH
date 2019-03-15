<?php



if (isset($_SESSION['fallaemail'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hay un probelma con el correo ingresado.</h5>';
    unset($_SESSION['fallaemail']);
}else{
    
    
    echo '<h5 class="text-danger">* correo oc.</h5>';
    
}

if (isset($_SESSION['fallaupdate'])) {
    echo '<br>';
    echo '<h5 class="--red">* Hubo un problema al actualizar su informacion.</h5>';
    unset($_SESSION['fallaupdate']);
}else{
    echo '<br>';
    echo '<h5 class="text-danger">* subida oc.</h5>';
    
}

if (isset($_SESSION['fallalongitud'])) {
    echo '<br>';
    echo '<h5 class="--red">* Ha ingresado demasiados caracteres en uno o mas campos.</h5>';
    unset($_SESSION['fallalongitud']);
}else{
    echo '<br>';
    echo '<h5 class="text-danger">* longitud oc.</h5>';
    
}

if (isset($_SESSION['vacios'])) {
    echo '<br>';
    echo '<h5 class="--red">* Uno o mas campos estan vacíos.</h5>';
    unset($_SESSION['vacios']);
}else{
    echo '<br>';
    echo '<h5 class="text-danger">* vacios oc.</h5>';
    
}



