<!-- php para poner boton cerrar sesion -->
<?php

// verificamos si $_SESSION no esta inicializada
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false; // aca dice que sino lo encuentra coloque false

?>



<!-- un solo archivo para tener todo el header -->
<!-- esto nos ayuda hacer modificaciones en el header una sola vez y que se refleje en todo el proyecto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <!-- un operador ternario lo de php y es como si fuera un if en una sola linea  -->
    <!-- evaluamos la variable inicio si esta como true (?) agrega la classs inicio si es false (:) la deja vacia -->
    <!-- isset nos revisa si una variable esta definida esto xk solo en el index la definimos el resto tiraba error -->
    <!-- isset tambien nos ayuda a no revelar la informacion ya en produccion (NO REVELAR INFORMACION) -->
    <!-- dspues eliminamos el isset xk en funciones.php inicializamos la variable ya no es necesario saber si esta definida -->
    <header class="header  <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <!-- / es una forma de referir a la pagina principal usando HTMl php tiene que ir el nombre-->
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logo tipo de Bienes raices">
                </a>
                                <!-- para poner el icono de menu responsive -->
                
                                <div class="mobile-menu">
                                    <img src="/build/img/barras.svg" alt="icono menu">
                                </div>
                                <!-- fin icono menu -->
                                <div class="derecha">
                                    <!-- trae la imagen del la luna en color negro -->
                                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                                    <nav class="navegacion">
                                        <a href="../../nosotros.php">Nosotros</a>
                                        <a href="../../anuncios.php">Anuncios</a>
                                        <a href="../../blog.php"> Blog</a>
                                        <a href="../../contacto.php"> Contacto</a>
                                        <!-- creamos un if para saber si el auth nos trae true y asi presentar el cerrar session -->
                                        <?php if ($auth): ?>
                                        <a href="../../cerrar-sesion.php"> Cerrar Sesion</a>
                                        <?php else: ?>
                                            <a href="../../login.php">Iniciar Sesion</a>
                                        <?php endif; ?>


                                    </nav>
                
                                </div>
                               
             </div>  <!-- Cierre de la barra -->
             <!-- <h1> Venta de Casas y Apartamentos Exclusivos de lujo</h1> -->
             <?php  echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : ''; ?>
        </div>

    </header>
