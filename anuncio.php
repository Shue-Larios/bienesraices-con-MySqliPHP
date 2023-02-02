<?php
declare(strict_types=1); // nos ayuda a encontrar errores por tipos de datos ingresados
require "includes/funciones.php";
incluirTemplates('header');  


// leo el id que stoy mandando dsd el boton ver propiedad
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); // validamos e el id sea un entero 

//valido si el id es entero sino lo mando a la paina principal
if (!$id) {
   header('location: /');
}

/// importamos la base de datos 
require "includes/config/database.php";
$db = conectarDB();
// Escribir el query y limitamos para q solo se muestren tres limite puesto en el index principal
$query = "SELECT * FROM propiedades WHERE id = ${id}";

// consultar la base de datos
$resultado = mysqli_query($db, $query);
// para acceder a la propiedad de un objeto en php es con -> se conoce como sintaxis de flecha en php
//num_rows significa el numero de filas
// le decimos que si no existe nos redireccion
if ($resultado->num_rows === 0 ) {
    header('location: /');
 }

$propiedad = mysqli_fetch_assoc($resultado);
 ?>

 
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <picture>
            <img  src="/imagenes/<?php echo $propiedad['imagen']; ?>">
            </picture>
            
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?> </p>
            <ul class="icono-caracteristicas">
                <li>
                    <img class="icono-dark" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    
                    <img class="icono-dark" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono-dark" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorios">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

    <?php
incluirTemplates('footer');  
mysqli_close($db);
 ?>
