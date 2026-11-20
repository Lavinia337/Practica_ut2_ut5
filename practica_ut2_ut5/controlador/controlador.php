
<?php

$pagina = $_GET['pagina'] ?? 'inicio';

switch ($pagina) {
    case 'inicio':
        require 'vistas/inicio.php';
        break;

    case 'perfil':
        require 'vistas/perfil.php';
        break;

    case 'pedido':
        require 'vistas/pedido.php';
        break;

    case 'carta':
        require 'vistas/carta.php';
        break;

    case 'clientes':
        require 'vistas/clientes.php';
        break;

    default:
        require 'vistas/error.php';
        break;
}
