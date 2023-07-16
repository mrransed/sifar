<?php

require("conexion.php");

if ($con->connect_error) {
    die("Error de conexión a la base de datos: " . $con->connect_error);
}



    $nombre = $_POST['nombre'];
    $tipoPlan = $_POST['tipoPlan'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

  
   
  
            $sql = "INSERT INTO planes (nombre,tipo_plan,descripcion,precio) 
                    VALUES ('$nombre','$tipoPlan', '$descripcion',$precio)";
            
            if (mysqli_query($con, $sql)) {
                echo "La historia se ha insertado correctamente.";
            } else {
                echo "Error al insertar la historia: " . mysqli_error($con);
            }
        


// Cierra la conexión a la base de datos

mysqli_close($con);
header("LOCATION:../index.php?pag=crud-planes&var=correct");
?>