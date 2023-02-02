<!-- sirve como base si quiero agregar mas paginas tiene header y footer -->

<?php
require "includes/funciones.php";
incluirTemplates('header');  
 ?>

<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <!-- / es una forma de referir a la pagina principal -->
                <a href="/">
                    <img src="build/img/logo.svg" alt="logo tipo de Bienes raices">
                </a>
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php"> Blog</a>
                    <a href="contacto.php"> Contacto</a>
                </nav>
             </div>  <!-- Cierre de la barra -->    
             <h1> Venta de Casas y Apartamentos Exclusivos de lujo</h1>
        </div>

    </header>

    <main class="contenedor seccion">
        <h1>Titulo pagina</h1>
    </main>

    <?php
incluirTemplates('footer');  

 ?>
    