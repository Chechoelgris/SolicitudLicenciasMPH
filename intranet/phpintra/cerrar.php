<?php 
session_start();

//Destruir todas las variables de sesion

$_SESSION = array();

//Si se desea destruir la sesion completamente, borre tambienb la cookie de sesion.
// Esto destruira la sesion, pero no la informacion de la sesion.

    if (ini_get("session.use_cookies")) {

        $params = session_get_cookie_params();
        setcookie(session_name(),'',time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//Finalmente, se destruye la sesion.

session_destroy();
header('Location:../../login.php');