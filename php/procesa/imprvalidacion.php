<?php



if (isset($_SESSION['fallaemail'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hay un problema con el correo ingresado.</h5>';
    unset($_SESSION['fallaemail']);
}
if (isset($_SESSION['fallaupdate'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hubo un problema al actualizar su información.</h5>';
    unset($_SESSION['fallaupdate']);
}

if (isset($_SESSION['fallainsert'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Hubo un problema al ingresar su información.</h5>';
    unset($_SESSION['fallainsert']);
}

if (isset($_SESSION['fallalongitud'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Ha ingresado una cantidad de caracteres no válida.</h5>';
    unset($_SESSION['fallalongitud']);
}

if (isset($_SESSION['vacios'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Uno o mas campos se enviaron vacíos.</h5>';
    unset($_SESSION['vacios']);
}


if (isset($_SESSION['existe'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Ya hay una solicitud pendiente asociada a su rut.</h5>';
    unset($_SESSION['existe']);
}


if (isset($_SESSION['nohaycupos'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* No hay cupos disponibles para la fecha seleccionada.</h5>';
    unset($_SESSION['nohaycupos']);
}

if (isset($_SESSION['noesfecha'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Debes seleccionar la fecha desde la lista desplegable o escribirla respetando su formato.</h5>';
    unset($_SESSION['noesfecha']);
}

if (isset($_SESSION['existe2'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Ya tienes una solicitud pendiente para la fecha indicada.</h5>';
    unset($_SESSION['existe2']);
}

if (isset($_SESSION['archivo'])) {
    echo '<br>';
    echo '<h5 class="text-danger">* Recuerda que solo puedes enviar imagenes en formato "jpeg" o "png", y el archivo no puede pesar mas de 5 mb.</h5>';
    unset($_SESSION['archivo']);
}

if (isset($_SESSION['solicitud'])) {
    echo '<br>';
    echo '<h5 class="text-danger">*Algo anda mal con tu solicitud, contacta al area de informatica de la Institucion.</h5>';
    unset($_SESSION['solicitud']);
}