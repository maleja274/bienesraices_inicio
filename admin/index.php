

    //importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();


    //Escribir el query
    $query = "SELECT * FROM propiedades";


    //consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra la imagen condicional 
    $resultado = $_GET['resultado'] ?? null;

    require '../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if(intval( $resultado) === 1): ?>
            <p class="alerta exito">Anuncio Creado correctamente</p>
        <?php elseif(intval( $resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado correctamente</p>

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
            <tbody> <!--Mostrar los resultados-->
                <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad ['id']; ?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php ?><?php echo $propiedad['id']; ?>"
                        >Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
<?php 
  //cerrar la conexion
  mysqli_close($db);
  
  incluirTemplate('footer');
?>