<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
       
        <picture>
            <source srcset="build/img/destacada2.web" type="imagen/webp">
            <source srcset="build/img/destacada2.jpg" type="imagen/jpg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/201</span>por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            
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