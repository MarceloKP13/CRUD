<?php
$servername = "sql202.infinityfree.com";
$username = "if0_38114556";
$password = "Al7YukNxfXw1ev";
$dbname = "if0_38114556_clase1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>