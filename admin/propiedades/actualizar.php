<!-- una copia del codigo de crear.php -->

<?php

require "../../includes/funciones.php";
$auth = estaAutenticado();

// importamos la base de datos 
require "../../includes/config/database.php";
$db = conectarDB();


incluirTemplates('header'); 

// echo "<pre>";
// var_dump ($_POST);
// echo "</pre>";
// exit;


$id = $_GET['id'];
$id = filter_var( $id, FILTER_VALIDATE_INT);

if (!$id) {
    header("location:/admin");
}

$query = "SELECT * FROM propiedades WHERE id= $id";


$resultadoConsulta = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultadoConsulta);



$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);




$errores = []; 

$titulo = $propiedad['titulo'];
$precio =$propiedad['precio'];
$descripcion = $propiedad['descripcion']; 
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId']; 

$imagenPropiedad = $propiedad['imagen']; 




if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
$titulo = mysqli_real_escape_string($db, $_POST['titulo']);


$precio = mysqli_real_escape_string($db, $_POST['precio']);
$descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
$habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
$wc = mysqli_real_escape_string($db, $_POST['wc']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamientos']);
$vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
$creado = date('Y/m/d');

$imagen = $_FILES['imagen'];



if (!$titulo ) {
    $errores[] = "Debe de añadir un titulo"; 
}

if (!$precio ) {
    $errores[] = "El precio es obligatorio"; 
}


// en actualiza rno es obligatorio hacer que vuelvan a subir la imagen
// if (!$imagen['name'] || $imagen['error']) {
//     $errores[] = "Imagen es obligatoria"; 
// }

$medida = 1000 * 100; 

if ($imagen['size'] > $medida ) {
    $errores[] = "IMAGEN MUY PESADA"; 
}



if ( strlen( $descripcion)<10 ) {
    $errores[] = "Descripcion obligatoria y debe tener mas 10"; 
}

if (!$habitaciones  ) {
    $errores[] = "Añada las habitaciones"; 
}

if (!$wc ) {
    $errores[] = "añada Baños"; 
}

if (!$estacionamiento ) {
    $errores[] = "Añada estacionamientos"; 
}

if (!$vendedorId ) {
    $errores[] = "Seleccione vendedor"; 
}

if (empty($errores)) {

// aca lo utilizamos para decirle dond estan las imagenes
    $carpetaImagenes = "../../imagenes";

if (!is_dir($carpetaImagenes)) { 
    mkdir($carpetaImagenes); 
}

// xk cuando actalizaba y no subia foto la borraba la q tenia
$nombreImagen = '';

// revisa si en su campo name hay un elemento nuevo
if ($imagen['name']) {
    // unlink funcion de PHP creada para eliminar archivos toma como valor el archivo q vamos a eliminar
    // le decimos donde estan las imagenes y concatenamos el nombre dl archivo
    unlink($carpetaImagenes . '/' . $propiedad['imagen']);

    $nombreImagen = md5(uniqid( rand(), true)) . ".jpg";

move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
} else{
    // sino se sube una nueva imagen que siga teniendo la q teniamos
    $nombreImagen = $propiedad['imagen'];
}




// el update no consume tantos recursos asi que no hay problema que reescriba todo el registro aunq unos valores sean iguales 
// no hay que crear comprobacionees innecesarias
// las que llevas  '' son string los numeros x eso no las lleva
// en el update el where es obligatorio xk sino todos los registros se van a modificar
$query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId}  WHERE id= ${id}";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {

    header("location:/admin ?resultado=2");
    }
}
}
 ?>



    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a class="boton boton-verde" href="/admin">Volver</a>


<?php foreach($errores as $error): ?>
    <div class="alerta error">
    <?php echo $error; ?>
    </div>
       <?php endforeach; ?>  


<!-- aca borramos el action xk de esa forma lo va a mandar al mismo archivo(pagina) -->
<form class="formulario" method="POST" enctype="multipart/form-data" >
             <fieldset> 
                <legend>Informacion General</legend> 
                <label for="titulo">Titulo: </label>
      
                <input type="text" placeholder="Titulo Propiedad" name="titulo" id="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" placeholder="Precio Propiedad" min="1" name="precio" id="precio" value="<?php echo $precio; ?>">


                  <label for="imagen">Imagen</label>
                  <input type="file" accept="image/png,image/jpeg" id="imagen" name="imagen">

                  <!-- mostramos la imagen -->
                  <img  src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

  
               <label for="descripcion">Descripcion</label>

                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>
           
            
            <fieldset>

            <legend>Informacion de la propiedad</legend> 
            <label for="habitaciones">habitaciones: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones; ?>">

            <label for="wc">baños: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="wc" id="wc" value="<?php echo $wc; ?>">

            <label for="estacionamientos">estacionamientos: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="estacionamientos" id="estacionamientos" value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
            <legend>Vendedor</legend> 
            <select name="vendedor" value="<?php echo $vendedorId; ?>">
            <option value=""  selected>-- Seleccione una opcion --</option>

            <?php  while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
 
            <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '';?>  value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ;?></option>
             <?php  endwhile ?>
            
        </select>

            </fieldset>
            <input type="submit" value="Actualizar Propiedad" class="boton-verde">

            </form>
         </main>

    <?php
incluirTemplates('footer');  

 ?>
    