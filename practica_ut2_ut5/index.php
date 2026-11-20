<?php
session_start();

require_once 'controladores/controlador.php';

$pagina = $_GET['pagina'] ?? 'inicio';
?>