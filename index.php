<?php

require "includes/funciones.php";

// una variable
// $inicio =   true;
// esta es la mejor forma de llamar los templates
incluirTemplates('header', $inicio =   true);  // pasamos para aca $inicio =   true; xk asi lo tenemos en la funcion de funciones.php
// esta forma es la principal para llamar templates
//  include "includes/templates/header.php"; 
 ?>

<!-- empieza hecho en HTML
<!DOCTYPE html>
<html lang="en">
<head> -->
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title> -->
<!-- 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra"> -->
                <!-- / es una forma de referir a la pagina principal -->
                <!-- <a href="/">
                    <img src="build/img/logo.svg" alt="logo tipo de Bienes raices">
                </a> -->
                <!-- para poner el icono de menu responsive -->
                
                <!-- <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu">
                </div> -->
                <!-- fin icono menu -->
                <!-- <div class="derecha"> -->
                    <!-- trae la imagen del la luna en color negro -->
                    <!-- <img class="dark-mode-boton" src="build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php"> Blog</a>
                        <a href="contacto.php"> Contacto</a>
                    </nav>

                </div>
                -->
             <!-- </div>  Cierre de la barra     -->
             <!-- <h1> Venta de Casas y Apartamentos Exclusivos de lujo</h1> -->
        <!-- </div> -->

    <!-- </header>  -->
    <!-- Fin hecho HTML -->
  <!-- DESDE ACA LO HICE YO PROBANDO UNA FORMA DE VER EL ESPACIO DE LOS ICONOS DE LA PARTE SOBRE NOSOTROS -->
        <!--  -----------------------------------     -->
    <!-- <main class="contenedor seccion sombra">
        <h1>Mas Sobre Nosotros</h1> -->
      
    <!-- <div class="icono-nosotros">
        <section class="icono">
            <h3>Seguridad</h3>
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="5" y="11" width="14" height="10" rx="2" />
                    <circle cx="12" cy="16" r="1" />
                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                  </svg>
            </div> -->
            <!--  Escribo Lorem y me genera un texto de Lorem Ipsum solo para ver como quedaria el diseño    -->
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat 
                dicta optio, explicabo, quam atque eius id saepe provident beatae 
            </p>

        </section>
        <section class="icono">
            <h3>Precio</h3>
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="7" y="9" width="14" height="10" rx="2" />
                    <circle cx="14" cy="14" r="2" />
                    <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                  </svg>
                 -->
            <!-- </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Iure porro animi ex quam quisquam doloremque cumque et nesciunt 
            </p>
        </section>

        <section class="icono">
            <h3>A Tiempo</h3>
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <polyline points="12 7 12 12 15 15" />
                  </svg>
            </div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint 
                mollitia nesciunt excepturi quisquam omnis error eos, corporis
            </p>

        </section>
    </div> -->
<!-- </main> -->

<!-- FIN DE LA PARTE HECHA POR MI -->

   
<main class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1> 
        <div class="iconos-nosotros">
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img class="icono" src="build/img/icono1.svg" alt=" Icono de seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img class="icono" src="build/img/icono2.svg" alt=" Icono de precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
            <div class="icono">
                <!-- loading="lazy" ayuda con el performance no lo carga sino se ocupa-->
                <img class="icono" src="build/img/icono3.svg" alt=" Icono de a tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2> Casas y Departamentos en Venta</h2>

        <!-- incluimos el parcial de anuncios en templates que es donde esta lo dinamico -->
<?php 
// limitamos para que solo se muestren tres en el index esta variable se la lleva al archivo q incluyo abajo
$limite = 3; 
include 'includes/templates/anuncios.php'
?>

        <!-- ultimo boton -->
    <div class="alinear-derecha">
          <a href="anuncios.php" class="boton-verde"> Ver Todas</a>
     </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contactoy un asesor se pondra en contacto contigo </p>
        <a href="contacto.php" class="boton-amarillo"> Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">  <!--   Entradas de blog siempre tienen que ir en un article -->

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4> Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>11/05/2022</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con 
                            los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">  <!--   Entradas de blog siempre tienen que ir en un article -->

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4> Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>11/05/2022</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles
                            y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <!-- Los testimoniales se colocan en una etiqueta blockquote es decir una cita-->
        <section class="testimoniales">
            <h3>testimonalales</h3>
            <div class="testimonial">
              <blockquote>
                El personal se comporto de una excelente forma, muy buena atencion
                y la casa que me ofrecieron cumple con todas mis expectativas
              </blockquote>
              <p>- Rene Larios</p>
            </div>
        </section>
    </div>
  

    
    <?php
incluirTemplates('footer');  

 ?>
    
