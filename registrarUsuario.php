<?php
include "conexion.php";

$name =$_POST['name'];
$lastName =$_POST['lastName'];
$email =$_POST['email'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$error =[];

if(empty($name)){
    $error[]="nombre requerido";
}
if(empty($lastName)){
    $error[]="apellido requerido";
}
if(empty($email)){
    $error[]="email requerido";
}
//Validar campos añadidos
if(empty($edad)){
    $error[] = "edad requerida";
}
if(empty($peso)){
    $error[] = "peso requerido";
}

if(empty($error)){
    
    $sql = $conn->query("INSERT INTO persona1 (nombre, apellido, email, edad, peso)
     VALUES ('$name', '$lastName','$email','$edad', '$peso')");

    if($sql){
        header("Location: index.php");
        //echo "se inserto correctamente";
    }else{
        echo "no se inserto";
    }

}else{
    foreach($error as $e){
        echo $e ."<br>";
    }
}


?>