<?php
session_start();
// la mejor forma para cerrar sesion es poner el arreglo de la super global vacio
$_SESSION = []; 
header("location: /");