<!-- para insertar datos en la base -->
<?php
require "../../includes/funciones.php";
require "../../includes/config/database.php";

$auth = estaAutenticado();

// negamos la autenticacion
if (!$auth){
    header("location: /");
}



incluirTemplates('header'); 

$db = conectarDB(); //mandamos a llamar la funcion de la conexion de la base de datos
//var_dump($db); // esto me muestra en pantalla informacion y es como diciendo que ya esta conectada


// hacer una consulta o select a la base de datos
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



//un arreglo para validar el formulario con mensajes de errores
// ejecuta el codigo dspues de que el usuario envia el formulario
$errores = []; //dejamos el arreglo vacio xk mas abajo agregamos datos

//para almacenar los datos cuando tire un error y no toque llenar todo el formulario de nuevo
// inicalizamos las variables vacias
$titulo = "";
$precio ="";
$descripcion = ""; 
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = ""; 



// este if sirve para saber si ya hay datos en el metodo post
// REQUEST_METHOD para saber que metodo esta enviando y se iguala para saber si es el post
if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
// echo "<pre>";
// // usar method="POST" cuando la informacion es muy sencible
// // usar method="GET" cuando pueda compartir la URL con alguie
// // para leer los datos por el metodo post
// echo var_dump($_POST);
// echo "</pre>";

// // los archivos se leen con otrs super global llamada $_files
// echo "<pre>";

// echo var_dump($_FILES);
// echo "</pre>";

// // para sanitizar el codigo  por tipo de funcion php
// $numero = "1hola1"; $resultado = filter_var($numero, FILTER_SANITIZE_STRING)
// var_dump($resultado);
// // para valiar el codigo por tipo de funcion php
// $numero = "correo@correo.com/";

// $resultado = filter_var($numero, FILTER_VALIDATE_EMAIL);
// var_dump($resultado);
// exit;

// los datos de los campos del formulario se mandan por metodo post y se almacenan en la global de php
// para meter los datos de post en una variable 
// mysqli_real_escape_string nos ayuda a revisar si en el campo no ingresan un odigo sql que pueda moficiar la base de datos
$titulo = mysqli_real_escape_string($db, $_POST['titulo']);
$precio = mysqli_real_escape_string($db, $_POST['precio']);
$descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
$habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
$wc = mysqli_real_escape_string($db, $_POST['wc']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamientos']);
$vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
$creado = date('Y/m/d');

//asignar files en una variable
$imagen = $_FILES['imagen'];


//pequeñas validaciones 
// ! indica como la parte vacia o que la niega
if (!$titulo ) {
    $errores[] = "Debe de añadir un titulo"; // aca agrega a la ultima posicion el arreglo
}

if (!$precio ) {
    $errores[] = "El precio es obligatorio"; // aca agrega a la ultima posicion el arreglo
}

//php limita a las imagenes a 2MB y si se sube una mas grande el size lo tira en cero pero marca error por eso lo ponemos aca abajo || esto indica "o"
if (!$imagen['name'] || $imagen['error']) {
    $errores[] = "Imagen es obligatoria"; // aca agrega a la ultima posicion el arreglo
}

// validamos el archivo por su tamaño (100kb de tamaño)
$medida = 1000 * 100; // esto nos va a convertir de bite a kilobytes ya que el size viene en bite
// los puse solo para ver el tamaño que tenias
// echo $medida;
// echo $imagen['size'];
if ($imagen['size'] > $medida ) {
    $errores[] = "IMAGEN MUY PESADA"; // aca agrega a la ultima posicion el arreglo
}


// le decimos que como minimo ponga 10 caracteres
if ( strlen( $descripcion)<10 ) {
    $errores[] = "Descripcion obligatoria y debe tener mas 10"; // aca agrega a la ultima posicion el arreglo
}

if (!$habitaciones  ) {
    $errores[] = "Añada las habitaciones"; // aca agrega a la ultima posicion el arreglo
}

if (!$wc ) {
    $errores[] = "añada Baños"; // aca agrega a la ultima posicion el arreglo
}

if (!$estacionamiento ) {
    $errores[] = "Añada estacionamientos"; // aca agrega a la ultima posicion el arreglo
}

if (!$vendedorId ) {
    $errores[] = "Seleccione vendedor"; // aca agrega a la ultima posicion el arreglo
}

 // exit; //detenemos la ejecucion para que no se ejecuta el insert util cuando estamos probando

//  hay que condicionar el insert para que no ingrese campos vacios y lo hacemos revisando que el arreglo de errores este vacio
//en caso que el arreglo de errores esta vacio si vamos a hacer el insert 
if (empty($errores)) {
// subida de archivos

//crear una carpeta en la raiz del proyecto
$carpetaImagenes = "../../imagenes";
//  mkdir() es para crear un directorio
// is_dir nos dice si una carpeta existe o no
if (!is_dir($carpetaImagenes)) { // cuando no exista que la cree ! nos ayuda en la negacion
    mkdir($carpetaImagenes); // cuando no hay errores crea la carpeta
}

// Generar un nombre unico a los archivos a subir
// md5 sirve para tomar una entrada y convertirla hachar 
// uniqid toma dos valores y como un unicoid y al final la extencion del archivo
$nombreImagen = md5(uniqid( rand(), true)) . ".jpg";


// Subimos la imagen
// mueve el archivo subido temporal a la carpeta q creamos con mkdir
// // $imagen['tmp_name'] es donde nos dice la ruta tempora
// $carpetaImagenes es la carpeta donde se va a guuardar
//  "/" . $nombreImagen . ".jpg" concatenamos el nombre que le queremos asignar y la extencion
move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
// exit;

        //para insertar los datos a la base
    //creamos una variable
    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion,habitaciones, wc,estacionamiento, creado, vendedorId) VALUES ('$titulo' , '$precio', '$nombreImagen' , '$descripcion','$habitaciones','$wc','$estacionamiento', '$creado', '$vendedorId');";
    // echo $query ; solo para probar si el $query esta bien

    // y para almacenar ya en la base de datos
    // primer dato es la conexion a la base de datos y el otro la variable del insert
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
    // echo "Insertado correctamente" en vez de mostrar un mensaje de realizado redireccionamos para evitar datos duplicados
    // estos nos ayuda a pasar datos a otra pantalla
    // un querystring inicia con ? esto para mostrar un msj en otra pantalla
    // header("location:/admin ?mensaje=Regisrado Correctamente&Registro=1"); si le quiero mandar mas de un dato por la URL
    // se recomineda mandar msj como en forma de abreviaturas 
    header("location:/admin ?resultado=1");
    }
}
}
 ?>



    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a class="boton boton-verde" href="/admin">Volver</a>

<!-- codigo php para recorrer el arreglo y mostrarlo en HTML -->
<!-- as $error es un alias nada mas -->
<?php foreach($errores as $error): ?>
    <div class="alerta error">
    <?php echo $error; ?>
    </div>
       <?php endforeach; ?>  <!--  decimos que es el final del ciclo -->


<!-- se recomienda usar el action la URL de la misma pagina -->
<!-- ccuando un formulario va a mandar archivo hay que agregarle otro atributo enctype="multipart/form-data" -->
<form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data" >
             <fieldset> <!-- hace como un cuadro que se meten los campos relacionados -->
                <legend>Informacion General</legend> <!-- pone como titulo -->
                <!-- for sirve para cuando le den clic al label nombre se ponga en el input con id nombre -->
                <label for="titulo">Titulo: </label>
                <!-- recomendacion poner el name como el id o como lo tengo en la base de datos -->
                <!-- value es el valor que va a tener el campo por eso inicializamos la variable vacia y dspues la llenamos y asi si tira un error el valor va a seguir siendo el mismo x ende lo muestra-->
                <input type="text" placeholder="Titulo Propiedad" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
          
                <!-- Precio -->
                <label for="precio">Precio</label>
                <input type="number" placeholder="Precio Propiedad" min="1" name="precio" id="precio" value="<?php echo $precio; ?>">

                  <!-- imagen -->
                  <label for="imagen">Imagen</label>
                  <!-- para guardar una imaegne lo ponemos como tipo file -->
                  <!-- accept="image/png,image/jpeg" la parte que limita que tipos de archivos se pueden subir -->
                  <input type="file" accept="image/png,image/jpeg" id="imagen" name="imagen">


               <!-- descripcion -->
               <label for="descripcion">Descripcion</label>
               <!-- importante el textarea no tiene value x eso lo ponemos asi -->
                <textarea id="descripcion" name="descripcion" maxlength="5"><?php echo $descripcion; ?></textarea>
            </fieldset>
           
            
            <fieldset>

            <legend>Informacion de la propiedad</legend> <!-- pone como titulo -->
            <label for="habitaciones">habitaciones: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones; ?>">

            <label for="wc">baños: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="wc" id="wc" value="<?php echo $wc; ?>">

            <label for="estacionamientos">estacionamientos: </label>
            <input type="number" placeholder="Ejm. 3" min="1" max="9" name="estacionamientos" id="estacionamientos" value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
            <legend>Vendedor</legend> <!-- pone como titulo -->
            <select name="vendedor" value="<?php echo $vendedorId; ?>">
            <option value=""  selected>-- Seleccione una opcion --</option>
            <!-- row es como vendedor  mysqli_fetch_assoc va a traer todos los datos hasta que ya no encuentre-->
            <!-- mostrar los datos en la consulta com $row la comunida se puso de aceurdo llamar asi -->
            <!-- row es como vendedor  mysqli_fetch_assoc va a traer todos los datos hasta que ya no encuentre-->
            <?php  while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                <!-- entre option y value hay unn operador terrnario que compara la variable $vendedorId es iguala a vendedor que es el de la base de datos si son iguales lo deja seleccionado (selected) sino no agrega nada -->
            <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '';?>  value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ;?></option>
             <?php  endwhile ?>
            
        </select>

            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton-verde">

            </form>
         </main>

    <?php
incluirTemplates('footer');  

 ?>
    