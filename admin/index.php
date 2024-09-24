<?php

    // Importar la conexión
    require '../includes/config/database.php';
    $db = conectarDB();

    // Escribir el query
    $query = "SELECT * FROM propiedades";

    // Consultar la base de datos
    $resultadoConsulta = mysqli_query($db, $query);

    //Busca el mensaje en la URL y en caso de no existir se le asigna el valor de NULL
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){

            // Eliminar la imagen de la propiedad
            $query = "SELECT imagen FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);

            // Eliminar la propiedad de la base de datos
            $query = "DELETE FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('location: /admin?resultado=3');
            }
        }
    }

    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <?php
        if(intval($resultado) === 1):
        ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio actualizado correctamente</p>
        <?php elseif(intval($resultado) === 3): ?>
            <p class="alerta exito">Anuncio eliminado correctamente</p>
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
                <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">

                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php

    // Cerrar la conexión con la base de datos
    mysqli_close($db);

    incluirTemplate('footer');
?>