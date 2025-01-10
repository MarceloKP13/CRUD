<?php
include "conexion.php";
// Validamos que los datos enviados desde el formulario existan antes de usarlos.
// Si alguna clave no existe en $_POST, asignamos un valor vacío por defecto.
$name = isset($_POST['name']) ? $_POST['name'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$id = isset($_POST['idUser']) ? $_POST['idUser'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';
$peso = isset($_POST['peso']) ? $_POST['peso'] : '';
// Creamos un arreglo para almacenar los posibles errores de validación.
$error = [];
// Verificamos que cada campo requerido no esté vacío. Si lo está, añadimos un mensaje de error.
if (empty($name)) {
    $error[] = "nombre requerido";
}
if (empty($lastName)) {
    $error[] = "apellido requerido";
}
if (empty($email)) {
    $error[] = "email requerido";
}
if (empty($edad)) {
    $error[] = "edad requerida";
}
if (empty($peso)) {
    $error[] = "peso requerido";
}

if (empty($error)) {
    $sql = $conn->query("UPDATE persona1 SET nombre = '$name', apellido = '$lastName', email = '$email', edad ='$edad', peso = '$peso'
    WHERE id = '$id'");

    if ($sql) {
        header("Location: index.php");
    } else {
        echo "No se pudo actualizar";
    }
} else {
    foreach ($error as $e) {
        echo $e . "<br>";
    }
}
?>