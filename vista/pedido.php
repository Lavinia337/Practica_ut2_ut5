
<?php

$archivo = fopen("../datos/menu.csv", "r");

$productos = [];

if ($archivo !== false) {

    while (($fila = fgetcsv($archivo, 0, "\t", '"', "")) !== false) {

        $productos[] = [
            "categoria" => $fila[0],
            "nombre" => $fila[1],
            "precio" => $fila[2],
            "imagen" => $fila[3],
            "alergenos" => $fila[4] ?? ""
        ];

    }

    fclose($archivo);
}

$categorias = ["Nigiri", "Maki", "Temaki", "Sashimi", "Otros", "Bebida"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar pedido - SushiTo</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>

<header>
    <h1>SushiTo</h1>
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
    <h2>Realizar pedido</h2>
    <?php foreach ($categorias as $categoria) { ?>

    <section>
        <h3><?php echo $categoria; ?></h3>

        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Alérgenos</th>
                <th>Cantidad</th>
            </tr>

            <?php foreach ($productos as $producto) { ?>

                <?php if ($producto["categoria"] == $categoria) { ?>

                    <tr>
                        <td><?php echo htmlspecialchars($producto["nombre"]); ?></td>

                        <td>
                            <img src="../recursos/<?php echo htmlspecialchars($producto["imagen"]); ?>"
                                 alt="<?php echo htmlspecialchars($producto["nombre"]); ?>"
                                 width="100">
                        </td>

                        <td><?php echo $producto["precio"]; ?> €</td>

                        <td><?php echo htmlspecialchars($producto["alergenos"]); ?></td>

                        <td>
                            <input type="number" name="cantidad[]" min="0" value="0">
                        </td>
                    </tr>

                <?php } ?>

            <?php } ?>

        </table>
    </section>

<?php } ?>

</main>
</body>
</html>
