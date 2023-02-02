<?php

// verificamos si $_SESSION no esta inicializada
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false; // aca dice que sino lo encuentra coloque false
?>



<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
            <a href="../../nosotros.php">Nosotros</a>
            <a href="../../anuncios.php">Anuncios</a>
            <a href="../../blog.php"> Blog</a>
            <a href="../../contacto.php"> Contacto</a>
            <?php if ($auth): ?>
                <a href="../../cerrar-sesion.php"> Cerrar Sesion</a>
                <?php else: ?>
                    <a href="../../login.php">Iniciar Sesion</a>
                    <?php endif; ?>
            </nav>
        </div>

        <!-- Funcion PHP para que el servidor detecte la fecha actual Y mayusucla imprime todo el año-->
        <!-- y guardo la fecha en una variable $fecha -->
        <!-- asi se mira cuando se comenta en codigo php no cambia a verde -->
         <!-- <?php 
$fecha = date('d, ,m ,y');
echo $fecha;
        ?> -->
<!-- imprime en pantalla solo el año  <?php echo date('Y') ?> -->
        <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy; </p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>  <!-- este archivo tiene el normalizer -->
</body>
</html>