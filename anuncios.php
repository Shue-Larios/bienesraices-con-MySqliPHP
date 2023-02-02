<?php
require "includes/funciones.php";
incluirTemplates('header');  
 ?>
    <main class="contenedor seccion">
        
            <h2> Casas y Departamentos en Venta</h2>
    

    <?php 
// limitamos para que solo se muestren tres en el index esta variable se la lleva al archivo q incluyo abajo
$limite = 10; 
include 'includes/templates/anuncios.php'
?>



    </main>

    <?php
incluirTemplates('footer');  

 ?>