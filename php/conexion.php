<?php
$servername = "localhost"; // nombre del servidor (puede variar)
$username = "root"; // nombre de usuario de la base de datos
$password = ""; // contraseña de la base de datos
$dbname = "sisGym"; // nombre de la base de datos


$con = mysqli_connect($servername, $username, $password, $dbname);


if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}



?>


