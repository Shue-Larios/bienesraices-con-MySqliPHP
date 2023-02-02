<?php

//conexion a la base de datos
require ("includes/config/database.php");
$db =  conectarDB();

// autenticamos al usuario
// para leer los datos del metodo post

//arreglo vacio para los errores
$errores = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //  agregamos a variables los datos q traemos por post
    // ponemos un filtro para saber si es tipo correo
    // como interactua directamente con la base le ponemos mysqli_real_escape_string
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //  en caso que no hay email
    if (!$email) {
        $errores [] = "EL email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores [] = "el password es obligatorio o no es valido";
    }
    // en caso que las validaciones esten vacias
    if (empty($errores)) {
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

    // var_dump($resultado);
// aca si num_rows viene en cero es xk el usuario no existe
    if ($resultado -> num_rows) {

        //REVISAR SI EL PASSWORD ES CORRECTO
        $usuario = mysqli_fetch_assoc($resultado);

        // verificar si el password es correcto o no con password_verify que toma dos argumentos
        // el password q el usuario a ingresado y dos el password ya hasheado
        $auth = password_verify($password, $usuario['password']);
        // var_dump($auth); me regresa un false si es incorrecto y true si es correcto
 //  para mandar un msj diciendo q el password es incorrecto
        if ($auth) {
// autenticamos el  usuario
// con la super globarl Session esta va a mantener informacion de la sesion del usuario
session_start();

//llenamos el arreglo de la sesion
$_SESSION['usuario'] = $usuario['email'];
$_SESSION['login'] = true;
//redireccionamos al usuario a la pagina que queremos entre
header("location: /admin/index.php?login=1");

        }else {
            $errores[] = "Password incorrecto";
        }
    }else {
       $errores[] = "El usuario no existe";
    }
}
}


//incluye el archivo header
require "includes/funciones.php";
incluirTemplates('header');
 ?>

<body>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <!-- el foreach se va a ejecutar mientras el arreglo tenga datos -->
<?php  foreach($errores as $error):?>
    <div class="alerta error">
<?php  echo $error;?>
    </div>
<?php  endforeach;?>



        <form method="POST" class="formulario " >
        <fieldset> <!-- hace como un cuadro que se meten los campos relacionados -->
                <legend> E-mail y Password   </legend> <!-- pone como titulo -->
                <!-- correo -->
                <label for="email">Correo Electronico</label>
                <input type="email" name="email" placeholder="Tu Correo" id="email" required>

                <!-- password -->
                <label for="password">password</label>
                <!-- HTML nos regala el tipo password para q salga oculto -->
                <input type="password" name="password" placeholder="Tu password" id="password" required>

            </fieldset>
            <input type="submit" class="boton boton-verde" value="Iniciar Sesion">
        </form>

    </main>

    <?php
    mysqli_close($db);
incluirTemplates('footer');

 ?>
