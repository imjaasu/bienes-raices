<?php
    //Busca el mensaje en la URL y en caso de no existir se le asigna el valor de NULL
    $resultado = $_GET['resultado'] ?? null;

    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <?php
        if(intval($resultado) === 1):
        ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>

        <h1>Administrador de Bienes Raíces</h1>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    </main>

<?php
    incluirTemplate('footer');
?>