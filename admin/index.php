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

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la playa</td>
                    <td> <img src="/imagenes/09c318c2f974be0c4f060df7f74f92b1.jpg" alt="" class="imagen-tabla"></td>
                    <td>$1200000</td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="#" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footer');
?>