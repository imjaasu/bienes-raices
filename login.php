<?php

    require 'includes/config/database.php';
    $db = conectarDB();

    // Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password']) ;

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido" ;
        }

        if(!$password){
            $errores[] = "La contraseña es obligatoria o no es correcta" ;
        }

        if(empty($errores)){
            
        }
    }

    // Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" action="" class="formulario">
            <fieldset>
                <legend>Email y Contraseña</legend>

                <label for="email">Email</label>
                <input type="email"  name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton-verde-block">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>