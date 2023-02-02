<!-- como no tenemos pagina para registrarse nosotros creamos un usuario y contraseña para la autenticacion -->
<!-- vamos a crear usuario y correo en 4 pasos -->
<?php

/// paso 1 importamos la base de datos 
require "includes/config/database.php";
$db = conectarDB();

// paso 2 crear un email y password
$email = "correo@correo.com";
$password = 123456;

// hashear el password
// md5() ya no se utiliza para nada relacionado con seguridad
// password_hash() ya es una funcion muy segura de php a partir de la version 7
// ocupa dos parametros la primera el password q vamos a hashear y la otra el algoritmo que de va a utilizar para hashear
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// paso 3 Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) values('${email}', '${passwordHash}')";

// paso 4 agregarlo a la base de datos
mysqli_query($db, $query);


// Escribir el query y limitamos para q solo se muestren tres limite puesto en el index principal


// consultar la base de datos
// $resultado = mysqli_query($db, $query);
