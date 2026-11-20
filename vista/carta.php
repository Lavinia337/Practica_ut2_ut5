<?php

$archivo = "../datos/menu.csv";
$productos = [];
$mensaje = "";

$lectura = fopen($archivo, "r");

if ($lectura !== false) {

    while (($fila = fgetcsv($lectura, 0, "\t", '"', "")) !== false) {

        $productos[] = [
            "categoria" => $fila[0] ?? "",
            "nombre" => $fila[1] ?? "",
            "precio" => $fila[2] ?? "",
            "imagen" => $fila[3] ?? "",
            "alergenos" => $fila[4] ?? ""
        ];

    }

    fclose($lectura);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productos = $_POST["productos"] ?? [];

    if (isset($_POST["eliminar"])) {

        unset($productos[$_POST["eliminar"]]);
        $productos = array_values($productos);

    } elseif (isset($_POST["accion"]) && $_POST["accion"] == "añadir") {

        $productos[] = [
            "categoria" => "",
            "nombre" => "",
            "precio" => "",
            "imagen" => "",
            "alergenos" => ""
        ];

    } elseif (isset($_POST["accion"]) && $_POST["accion"] == "guardar") {

        $completo = true;

        foreach ($productos as $producto) {

            foreach ($producto as $dato) {

                if (trim($dato) == "") {
                    $completo = false;
                }

            }

        }

        if ($completo) {

            $escritura = fopen($archivo, "w");

            foreach ($productos as $producto) {

                fputcsv($escritura, [
                    $producto["categoria"],
                    $producto["nombre"],
                    $producto["precio"],
                    $producto["imagen"],
                    $producto["alergenos"]
                ], "\t", '"', "");

            }

            fclose($escritura);

            $mensaje = "Menú guardado correctamente.";

        } else {

            $mensaje = "Falta información en algún plato.";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de carta - SushiTo</title>
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

    <h2>Gestión de carta</h2>

    <p><?php echo $mensaje; ?></p>

    <form method="POST">

        <table border="1">

            <tr>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Alérgenos</th>
                <th>Eliminar</th>
            </tr>

            <?php foreach ($productos as $indice => $producto) { ?>

                <tr>

                    <td>
                        <input type="text" name="productos[<?php echo $indice; ?>][categoria]"
                        value="<?php echo htmlspecialchars($producto["categoria"]); ?>">
                    </td>

                    <td>
                        <input type="text" name="productos[<?php echo $indice; ?>][nombre]"
                        value="<?php echo htmlspecialchars($producto["nombre"]); ?>">
                    </td>

                    <td>
                        <input type="text" name="productos[<?php echo $indice; ?>][precio]"
                        value="<?php echo htmlspecialchars($producto["precio"]); ?>">
                    </td>

                    <td>
                        <input type="text" name="productos[<?php echo $indice; ?>][imagen]"
                        value="<?php echo htmlspecialchars($producto["imagen"]); ?>">
                    </td>

                    <td>
                        <input type="text" name="productos[<?php echo $indice; ?>][alergenos]"
                        value="<?php echo htmlspecialchars($producto["alergenos"]); ?>">
                    </td>

                    <td>
                        <button type="submit" name="eliminar" value="<?php echo $indice; ?>">
                            Eliminar
                        </button>
                    </td>

                </tr>

            <?php } ?>

        </table>

        <button type="submit" name="accion" value="añadir">
            Añadir plato
        </button>

        <button type="submit" name="accion" value="guardar">
            Guardar
        </button>

    </form>

</main>

</body>
</html>
