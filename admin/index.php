<?php
// incluir la sesion siempre tiene que ser lo primero
require "../includes/funciones.php";
$auth = estaAutenticado();

// negamos la autenticacion
if (!$auth){
    header("location: /");
}

/// importamos la base de datos 
require "../includes/config/database.php";
$db = conectarDB();
// Escribir el query
$query = "SELECT * FROM propiedades";


// consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);


// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

//trae un mensaje por metodo GET desde crear.php
// ?? lo que hace es buscar ese valor y si no existe agrega null
$resultado = $_GET['resultado'] ?? null;
$login = $_GET['login'] ?? null; // para darle un msj de bienvenida sino encuentra el valor pone null


// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";


//esto sirve con el boton eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); // validamos si el id sea un entero
    if ($id) {
// elimina el archivo 
$query = "SELECT imagen FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    unlink('../imagenes' . '/' . $propiedad['imagen']);

    // elimina la propiedad de la base
    $query = "DELETE FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    // aca decimos si hay un resultado entoncs redireccionamos
if ($resultado) {
    header("location:/admin?resultado=3");
}
}
}

incluirTemplates('header');  
 ?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <!-- utilizamos intval que es el valor entero de una variable ya que $resultado arriba venia coomo string y por el === que revisa todo no funcionaba -->
        <?php if (intval( $resultado)  === 1) : ?>
            <p class="alerta exito"> Anuncio creado correctamente</p>
            <?php elseif (intval( $resultado)  === 2) : ?>
            <p class="alerta exito"> Anuncio actualizado correctamente </p>
            <?php elseif (intval( $resultado)  === 3) : ?>
            <p class="alerta exito"> Anuncio eliminado correctamente </p>

            <?php elseif (intval( $login)  === 1) : ?>
            <p class="alerta exito"> Bienvenido al sistema </p>
        <?php endif; ?>


<a class="boton boton-verde" href="/admin/propiedades/crear.php">Nueva Propiedad</a>
        <!-- <a class="boton boton-verde" href="/admin/propiedades/actualizar.php">Actualizar Propiedad</a>
        <a class="boton boton-verde" href="/admin/propiedades/borrar.php">Borrar Propiedad</a> -->


        <!-- creamos una tabla para ver los datos de la base de Datos -->
        <table class="propiedades">
        <thead>
        <th>ID </th>
        <th>Titulo </th>
        <th>Imagen</th>
        <th>Precio </th>
        <th>Acciones </th>
        </thead>


        <tbody>
            <!-- codigo para mostrara los resultados desde la base a la tabla -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
                <!-- hacemos el codigo mas dinamico para que muestre los datos como en la base -->
                <td>  <?php echo $propiedad['id']; ?>  </td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <!-- como en la base de datos solo almacenamos el nombre del archivo concatenamos la URL de la carptea de imagenes y x php traemos solo el nombre de la base -->
                <td> <img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" alt=""></td>
                <td>$<?php echo $propiedad['precio']; ?></td>
                <td>
                    <!-- como no tiene action manda los datos al mismo archivo -->
                    <form method="POST" >
                        <!-- hidden hace que no se muestre y asi podes mandar datos ocultos el id q vamos a eliminar -->
                    <input type="hidden" name="id" value="<?php echo $propiedad['id']?>" >
                    <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
                  
                    </form>
                    
                    <!-- con el codigo php aca pasamoe el id por metoodo get -->
                    <a class="boton-amarillo-block" href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?> ">Actualizar</a>
                </td>

            </tr>
            <?php endwhile; ?>
        </tbody>

        </table>

    </main>

    <?php
//cerramos la conexion con la base de datos
mysqli_close($db);

incluirTemplates('footer');  

 ?>
    