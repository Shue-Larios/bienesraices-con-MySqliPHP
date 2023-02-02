<?php
require "includes/funciones.php";
incluirTemplates('header');  
 ?>


    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <!-- el orden es muy importante -->
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <!--  -->
            <div class="texto-nosotros">
                <blockquote> <!--  se usa cuando estamos citando por decirlo  -->
                    25 años de experiencia 
                </blockquote>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <!--  -->
        </div>
    </main>
    <!--  no puede ir dos main solo se permite uno por pagina section es lo mismo y como este de abajo lo copie tal cual dl index -->
    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1> 
        <div class="iconos-nosotros">
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img src="build/img/icono1.svg" alt=" Icono de seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img src="build/img/icono2.svg" alt=" Icono de precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img src="build/img/icono3.svg" alt=" Icono de a tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
        </div>
    </section>
    
    <?php
incluirTemplates('footer');  

 ?>