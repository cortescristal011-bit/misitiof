<?php
require_once __DIR__ . '/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $id_producto  = isset($_POST['codigo']) ? $conexion->real_escape_string($_POST['codigo']) : '';
    $nom_producto = isset($_POST['nproducto']) ? $conexion->real_escape_string($_POST['nproducto']) : '';
    $costo        = isset($_POST['costop']) ? $conexion->real_escape_string($_POST['costop']) : 0;
    $porc_venta   = isset($_POST['porcentajev']) ? $conexion->real_escape_string($_POST['porcentajev']) : 0;
    $fecha        = isset($_POST['fecha_creacion']) ? $conexion->real_escape_string($_POST['fecha_creacion']) : '';
    $precio_venta = isset($_POST['pventa']) ? $conexion->real_escape_string($_POST['pventa']) : 0;

    $imagenPath = null;

    if (isset($_FILES['simagen']) && $_FILES['simagen']['error'] === UPLOAD_ERR_OK) {
        $tmpName  = $_FILES['simagen']['tmp_name'];
        $name     = basename($_FILES['simagen']['name']);
        $target   = __DIR__ . '/imgfares/' . $name;
        if (move_uploaded_file($tmpName, $target)) {
            $imagenPath = 'imgfares/' . $name;
        }
    }


    $sql = "INSERT INTO inventario (codigo, nom_producto, costo, porc_venta, precio_venta, imagen, stock, fecha) VALUES ('{$id_producto}', '{$nom_producto}', '{$costo}', '{$porc_venta}', '{$precio_venta}', " . ($imagenPath ? "'{$imagenPath}'" : 'NULL') . ", 0, '{$fecha}')";

    if ($conexion->query($sql) === TRUE) {
        header('Location: cproductos.php?ok=1');
        exit;
    } else {
        echo 'Error: ' . $conexion->error;
    }
}

header('Location: cproductos.php');
exit;
