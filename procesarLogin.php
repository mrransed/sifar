<?php
require("php/conexion.php");


    $username = $_POST['nombre'];
    $password = $_POST['clave'];

    echo $username;
    echo $password;

    // Consulta para verificar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE nombre = '$username' AND clave = '$password'";
    $result = mysqli_query($con, $query)or die("Error in the query".mysqli_error($con)); 
    $res=mysqli_fetch_array($result);
    echo $res['nombre'];

    if (mysqli_num_rows($result) > 0) {
        // Usuario válido, redirigir al home
        session_start();
        
        $_SESSION['usuario']=$username;

        header("Location:index.php?pag=mensaje");
        // exit();
    } else {
        // Usuario inválido, redirigir al login
        header("Location: wpAdminLogin.php");
        // exit();
    }


// Cerrar la conexión
$con->close();
?>