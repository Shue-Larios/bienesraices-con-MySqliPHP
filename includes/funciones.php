<?php
// xk TEMPLATES_URL esta definida en app.php
require 'app.php';
// hacemos esto para llamar de una forma mejor los templates
// %por decirlo asi Inicio lo inicializamos en false y donde se ocupa lo ponemos true
//mejoramos el codigo diciendo q tipo de dato va hacer cada parametro
function incluirTemplates (string $nombre, bool $inicio = false) {
// solo para imprimir y verificar si la ruta estaba completa
    // echo TEMPLATES_URL."/${nombre}.php"; 
    // TEMPLATES_URL esta definida en app.php y es como que si ponga la ruta yo mismo es igual
 include TEMPLATES_URL."/${nombre}.php"; 

}


//funcion para proteger la URL
function estaAutenticado() : bool {
    session_start();
    $auth =  $_SESSION['login'];
    if ($auth) {
        return true;
    }
    // esto es como si tuviera un else
    return false;

}
