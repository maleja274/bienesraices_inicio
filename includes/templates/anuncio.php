<?php 

    // Importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    //consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //obtener resultado
    $resultado = mysqli_query($db, $query);


?>
<h1><?php echo $propiedad['titulo']; ?></h1>
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>">
        <div class="resumen-propiedad">
            
            <p class="precio"><?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono baño">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed malesuada nisi, sed feugiat turpis. 
            Sed rhoncus leo eu tortor aliquet, faucibus egestas justo porttitor. Vestibulum vitae dui ac sem venenatis 
            blandit vel quis lacus. Phasellus nec dolor hendrerit neque venenatis elementum. Praesent ac consectetur eros. 
            Mauris nisi elit, imperdiet eu varius in, luctus nec ante. Pellentesque tincidunt risus et lectus efficitur, 
            consequat aliquet turpis condimentum. Pellentesque a elementum mi, sit amet ultricies orci. 
            Proin mattis tristique dapibus. In vel lorem vehicula, hendrerit sapien eget, venenatis magna. 
            Nulla massa urna, imperdiet ac lorem congue, commodo porttitor sem.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed malesuada nisi, sed feugiat turpis. 
            Sed rhoncus leo eu tortor aliquet, faucibus egestas justo porttitor. Vestibulum vitae dui ac sem venenatis 
            blandit vel quis lacus. Phasellus nec dolor hendrerit neque venenatis elementum. Praesent ac consectetur eros. 
            Mauris nisi elit, imperdiet eu varius in, luctus nec ante. Pellentesque tincidunt risus et lectus efficitur, 
            consequat aliquet turpis condimentum. Pellentesque a elementum mi, sit amet ultricies orci. 
            Proin mattis tristique dapibus. In vel lorem vehicula, hendrerit sapien eget, venenatis magna. 
            Nulla massa urna, imperdiet ac lorem congue, commodo porttitor sem.</p>
                

        </div>
    <?php endwhile; ?>

<?php 
    //cerrar la conexion
    mysqli_close($db);
?>