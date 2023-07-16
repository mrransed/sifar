<?php

require("conexion.php");

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$clases = $_POST['clases'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direcion = $_POST['direcion'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = $_POST['imc'];
$planes = $_POST['planes'];



$query =mysqli_query($con,"SELECT cedula FROM usuarios where cedula='$cedula'")or die("error".mysqli_error($con));

$res=mysqli_fetch_array($query);

//  $idUsuario=$res['id'];
//  $nombreUsuario=$res['nombre'];
//  $apellidos=$res['apellidos'];
//  $email=$res['email'];
 $cedulaU=$res['cedula'];

 echo $cedulaU;

//  $nombreCliente=$nombreUsuario." ".$apellidos;




 ?>


    
    