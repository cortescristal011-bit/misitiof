<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "sistem_fares";

$conexion = new mysqli($server, $username, $password, $db);


if ($conexion->connect_error) {
    die("Conexion fallida " . $conexion->connect_error);
}
