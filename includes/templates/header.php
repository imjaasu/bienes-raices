<?php 

    if(!isset($_SESSION)){
        session_start();
    }

    $autenticado = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header  <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raíces">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="boton dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>

                        <?php if($autenticado): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
                
            </div>

            <?php
            if($inicio){ ?>
                <h1>Venta de Casas y Departamenos Exclusivos de Lujo</h1>
            <?php }?>
        </div>
    </header>