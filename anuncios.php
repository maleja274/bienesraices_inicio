<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor">
        <section class="seccion contenedor">
            <h1>Casas y depas en Ventas</h1>

        <?php 
            $limite = 10;
            include 'includes/templates/anuncios.php';
        ?>

        </section>
    </main>
<?php 
    incluirTemplate('footer');
?>