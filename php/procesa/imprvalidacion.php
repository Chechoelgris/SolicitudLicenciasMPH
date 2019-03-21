<?php



if (isset($_SESSION['fallaemail'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hay un problema con el correo ingresado.</h5>';
    unset($_SESSION['fallaemail']);
}else{
       
}

if (isset($_SESSION['fallaupdate'])) {
    echo '<br>';
    echo '<h5 class="--red">* Hubo un problema al actualizar su informacion.</h5>';
    unset($_SESSION['fallaupdate']);
}else{
    
    
}

if (isset($_SESSION['fallainsert'])) {
    echo '<br>';
    echo '<h5 class="--red">* Hubo un problema al ingresar su informacion.</h5>';
    unset($_SESSION['fallainsert']);
}else{
    
    
}

if (isset($_SESSION['fallalongitud'])) {
    echo '<br>';
    echo '<h5 class="--red">* Ha ingresado demasiados caracteres en uno o mas campos.</h5>';
    unset($_SESSION['fallalongitud']);
}else{
   
    
}

if (isset($_SESSION['vacios'])) {
    echo '<br>';
    echo '<h5 class="--red">* Uno o mas campos se enviaron vacíos.</h5>';
    unset($_SESSION['vacios']);
}else{
    
    
}



