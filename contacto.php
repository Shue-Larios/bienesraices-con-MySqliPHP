<?php
require "includes/funciones.php";
incluirTemplates('header');  
 ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>
        <picture>
            <!-- el orden es muy importante -->
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>

        <!-- todos los formularios deben ir dentro de un form -->
        <form class="formulario">
             <fieldset> <!-- hace como un cuadro que se meten los campos relacionados -->
                <legend>Informacion Personal</legend> <!-- pone como titulo -->
                <!-- for sirve para cuando le den clic al label nombre se ponga en el input con id nombre -->
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">
                <!-- email -->
                <label for="email">Correo Electronico</label>
                <input type="email" placeholder="Tu Correo" id="email">

                <!-- Telefono -->
                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">
                <!-- mensaje -->
                <label for="mensaje">Mensaje</label>
                <textarea placeholder="Tu Mensaje"  id="mensaje"></textarea>
            </fieldset>


            <fieldset>
                <legend>informacion de propiedad</legend>
                <label for="opciones">Venta o Compra</label>
                <!-- select es como un combobox -->
                <select  id="opciones">
                    <!-- se queda como la primer linea se puede ver pero no seleccionar -->
                    <option value="" disabled selected>-- Seleccione una opcion --</option>
                    <!-- como option se va agregando cada una de las opciones -->
                    <!-- value es lo q se va a mandar al servidor -->
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>
                <!-- email -->
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu percio o presupuesto" min="1" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <!-- ponemos el mismo nombre en name para que solo deje seleccionar un radio de los dos -->
                    <input type="radio" name="contacto" value="telefono" id="contactar-telefono">
                    <label for="contactar-correo">Correo</label>
                    <input type="radio" name="contacto" value="correo" id="contactar-correo">
                </div>

                <p>Si Eligio telefono, elija la fecha y la hora </p>
                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha">

                <label for="hora">Hora: </label>
                <!-- min y max es el limite de horario  -->
                <input type="time" id="hora" min="09:00" max="17:00">
            </fieldset>

            <!-- los botones tienen que estar antes de cerrar el form para enviar todo los datos dl formulario -->
            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>
    
    <?php
incluirTemplates('footer');  

 ?>

