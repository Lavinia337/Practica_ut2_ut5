<?php

    $archivo = "datos/usuarios.json";

    $contenido = file_get_contents($archivo);

    $usuarios = json_decode($contenido, true);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushito - Restaurante japonés</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header>
        <h1>Sushito</h1>
        <p>Auténtico sabor japonés</p>
    </header>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="vista/perfil.php">Perfil</a>
        <a href="vista/pedido.php">Generar pedido</a>
        <a href="vista/carta.php">Gestión de carta</a>
        <a href="vista/clientes.php">Mejores clientes</a>
    </nav>

    <main>
        <section class="bienvenida">
            <h2>¡Bienvenido a Sushito!</h2>
            <p>
                Descubre nuestra selección de sushi y platos japoneses.
                Prepara tu pedido y disfruta de nuestros sabores desde casa.
            </p>
        </section>

        <section class="conexion">
            <h2>Iniciar sesión</h2>

            <form action="" method="POST">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Conectarse</button>
            </form>
        </section>
    </main>
</body>
</html>
