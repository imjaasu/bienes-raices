<?php

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consulta para obtener los vendedores en la BD
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones =  mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        // Valida si el usuario ingresó el título
        if(!$titulo){
            $errores[] = "Debes añadir un título"; 
        }

        // Valida si el usuario ingresó el precio
        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }

        // Valida si el usuario ingresó una descripción
        if(strlen($descripcion) < 50){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        // Valida si el usuario ingresó el número de habitaciones
        if(!$habitaciones){
            $errores[] = "El número de habitaciones es obligatorio";
        }

        // Valida si el usuario ingresó el número de baños
        if(!$wc){
            $errores[] = "El número de baños es obligatorio";
        }

        // Valida si el usuario ingresó el número de estacionamientos
        if(!$estacionamiento){
            $errores[] = "El número de estacionamientos es obligatorio";
        }

        if(!$vendedorId){
            $errores[] = "Elige un vendedor";
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        // Validar por tamaño de imagen (1MB máximo)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida){
            $errores[] = "La imagen sobrepasa el peso máximo";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // INSERTAR EN LA BASE DE DATOS

        // Revisar que el arreglo de errores está vacío
        if(empty($errores)){

            // *SUBIDA DE ARCHIVOS*

            // Crear una carpeta si no existe
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // Generar un nombre único a los archivos
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen a la carpeta
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado){
                // Redirigir al usuario si los datos se enviaron correctamente

                header('Location: /admin?resultado=1');
            } else{
                
            }
            }
    }

    

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>

            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>
            
            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="">
                    <option value="">-- Seleccione --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)):  ?>
                        <option <?php echo $vendedorId === $row['id'] ? 'selected' : '';  ?> value="<?php echo $row['id']; ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>