<?php

$archivo = fopen("../datos/usuarios.json", "r");
$contenido = fread($archivo, filesize("../datos/usuarios.json"));
$usuarios = json_decode($contenido, true);
fclose($archivo);

$archivo = fopen("../datos/paises.csv", "r");

$paises = [];

while (($pais = fgets($archivo)) !== false) {
    $paises[] = trim($pais);
}

fclose($archivo);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - SushiTo</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>

<header>
    <h1>Sushito</h1>
    <p>Auténtico sabor japonés</p>
</header>

<nav>
    <a href="../index.php">Inicio</a>
    <a href="perfil.php">Perfil</a>
    <a href="pedido.php">Generar pedido</a>
    <a href="carta.php">Gestión de carta</a>
    <a href="clientes.php">Mejores clientes</a>
</nav>

<main>
    <h2>Perfil de usuario</h2>
    <form method="POST" enctype="multipart/form-data">

        <label>Nombre de usuario:</label>
        <input type="text" name="username" required>

        <label>Contraseña:</label>
        <input type="text" name="password" required>

        <label>Nombre completo:</label>
        <input type="text" name="nombre" required>

        <label>País:</label>
        <select name="pais" required>

            <?php foreach ($paises as $pais) { ?>

                <option value="<?php echo htmlspecialchars($pais); ?>">
                    <?php echo htmlspecialchars($pais); ?>
                </option>

            <?php } ?>

        </select>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required>

        <label>Correo electrónico:</label>
        <input type="email" name="correo" required>

        <label>Avatar:</label>
        <input type="file" name="avatar">

        <button type="submit">Confirmar datos</button>

    </form>
</main>

</body>
</html>
