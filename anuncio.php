<?php

    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    // Conexión con la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consulta a la base de datos
    $query = "SELECT * FROM propiedades WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows){
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen de la propiedad">
        
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget gravida odio. Fusce quis vehicula lacus. Fusce mollis faucibus nulla, ut rhoncus velit pulvinar vitae. Quisque feugiat sem non fringilla mollis. Aliquam tincidunt pretium auctor. Suspendisse fermentum ligula sed orci eleifend, eget facilisis ipsum tempor. Suspendisse vitae sem libero. In in nulla luctus, posuere metus ullamcorper, interdum velit. Duis posuere molestie nibh nec pharetra.

            </p>

            <p>
                Donec velit neque, elementum non pulvinar sit amet, aliquet nec metus. Nullam ullamcorper massa nec libero vehicula, ut venenatis nunc suscipit. Phasellus fringilla elit eu pellentesque eleifend. Integer odio metus, posuere eu mi in, congue vestibulum purus. Aliquam hendrerit dictum luctus. Fusce convallis diam nec velit posuere, eu elementum neque tempor.</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');

    // Cerrar conexión con la base de datos
    mysqli_close($db);
?>