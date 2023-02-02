<?php
/// importamos la base de datos 
require "includes/config/database.php";
$db = conectarDB();
// Escribir el query y limitamos para q solo se muestren tres limite puesto en el index principal
$query = "SELECT * FROM propiedades LIMIT ${limite}";


// consultar la base de datos
$resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncio">
<?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
       
         <div class="anuncio"> <!-- Primer anuncio -->

            <picture>
            <img  src="/imagenes/<?php echo $propiedad['imagen']; ?>">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></</p>
                <p class="precio">$ <?php echo $propiedad['precio']; ?></</p>
                <ul class="icono-caracteristicas">
                    <li>
                        <img class="icono-dark" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></</p>
                    </li>
                    <li>
                        <img class="icono-dark" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']; ?></</p>
                    </li>
                    <li>
                        <img class="icono-dark" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dododormitorios">
                        <p><?php echo $propiedad['habitaciones']; ?></</p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block"> Ver propiedad</a>
</div>
</div>
        <?php endwhile ?>
</div> 
 
    <!-- cerramos conexion -->
    <?php
mysqli_close($db);

?>