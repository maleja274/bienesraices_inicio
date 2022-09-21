<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.web" type="imagen/webp">
            <source srcset="build/img/destacada.jpg" type="imagen/jpg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$280.000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono baño">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
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
    </main>
<?php 
    incluirTemplate('footer');
?>