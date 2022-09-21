<?php include "includes/templates/header.php"; ?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
            <div class="contenido-nosotros">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/nosotros.webp" type="image/webp">
                        <source srcset="build/img/nosotros.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                    </picture>
                </div>
                <div class="texto-nosotros">
                    <blockquote>
                        25 años de Experiencia
                    </blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed malesuada nisi, sed feugiat turpis. 
                    Sed rhoncus leo eu tortor aliquet, faucibus egestas justo porttitor. Vestibulum vitae dui ac sem venenatis 
                    blandit vel quis lacus. Phasellus nec dolor hendrerit neque venenatis elementum. Praesent ac consectetur eros.
                    Mauris nisi elit, imperdiet eu varius in, luctus nec ante.</p>

                    <p>Pellentesque tincidunt risus et lectus efficitur,consequat aliquet turpis condimentum. Pellentesque a elementum mi, sit amet ultricies orci. Proin mattis 
                    tristique dapibus. In vel lorem vehicula, hendrerit sapien eget, venenatis magna. Nulla massa urna, imperdiet 
                    ac lorem congue, commodo porttitor sem.</p>
                </div>
            </div>
    </main>

        <section class="contenedor">
            <h1>Mas sobre Nosotros</h1>
            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam odio turpis, efficitur non facilisis et, 
                    placerat sed mi. Donec ornare facilisis lectus, ultricies suscipit massa eleifend non. Suspendisse 
                    malesuada nisi quam, id aliquet mi rhoncus finibus.</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam odio turpis, efficitur non facilisis et, 
                    placerat sed mi. Donec ornare facilisis lectus, ultricies suscipit massa eleifend non. Suspendisse 
                    malesuada nisi quam, id aliquet mi rhoncus finibus.</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                    <h3>A Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam odio turpis, efficitur non facilisis et, 
                    placerat sed mi. Donec ornare facilisis lectus, ultricies suscipit massa eleifend non. Suspendisse 
                    malesuada nisi quam, id aliquet mi rhoncus finibus.</p>
                </div>
            </div>
        </section>
<?php 
    include "includes/templates/footer.php"; 
?>