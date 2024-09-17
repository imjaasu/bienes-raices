<?php
    include './includes/templates/header.php';
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget gravida odio. Fusce quis vehicula lacus. Fusce mollis faucibus nulla, ut rhoncus velit pulvinar vitae. Quisque feugiat sem non fringilla mollis. Aliquam tincidunt pretium auctor. Suspendisse fermentum ligula sed orci eleifend, eget facilisis ipsum tempor. Suspendisse vitae sem libero. In in nulla luctus, posuere metus ullamcorper, interdum velit. Duis posuere molestie nibh nec pharetra.

            </p>

            <p>
                Donec velit neque, elementum non pulvinar sit amet, aliquet nec metus. Nullam ullamcorper massa nec libero vehicula, ut venenatis nunc suscipit. Phasellus fringilla elit eu pellentesque eleifend. Integer odio metus, posuere eu mi in, congue vestibulum purus. Aliquam hendrerit dictum luctus. Fusce convallis diam nec velit posuere, eu elementum neque tempor.</p>
        </div>
    </main>

    <footer class="footer seccion">
        <div class="contenedor-footer contenedor">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados 2024</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>