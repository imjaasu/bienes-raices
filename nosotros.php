<?php
    include './includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In congue odio elit, in scelerisque erat egestas sed. Morbi sit amet velit non turpis porta dictum. Proin rutrum, justo a vulputate tempus, ipsum libero sodales risus, at molestie mi orci ut elit. Phasellus aliquet, diam nec molestie suscipit, eros justo venenatis mi, vitae suscipit quam justo in justo. Praesent viverra ultricies tellus, in malesuada ante sodales ac. Phasellus felis erat, imperdiet in diam at, varius tristique ex. Pellentesque purus sapien, fermentum id faucibus et, pretium sed est.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, cumque voluptatem sed numquam ut excepturi maxime, alias quis consectetur voluptatibus amet non!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, cumque voluptatem sed numquam ut excepturi maxime, alias quis consectetur voluptatibus amet non!</p>
                
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, cumque voluptatem sed numquam ut excepturi maxime, alias quis consectetur voluptatibus amet non!</p>
            </div>
        </div>
    </section>

<?php
    include './includes/templates/footer.php';
?>