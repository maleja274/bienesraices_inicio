<?php 

    $resultado = $_GET['resultado'] ?? null;

    require '../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if(intval( $resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la playa</td>
                    <td><img src="/imagenes/a99220114b8a417f5d5378859b07946d.jpg" class="imagen-tabla"> </td>
                    <td>120000000</td>
                    <td>
                        <a class="boton-rojo-block" href="#">Eliminar</a>
                        <a class="boton-amarillo-block" href="#">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
<?php 
    incluirTemplate('footer');
?>