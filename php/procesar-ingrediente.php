<?php

require("conexion.php");

if ($con->connect_error) {
    die("Error de conexión a la base de datos: " . $con->connect_error);
}



    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $receta = $_POST['receta'];
    echo $receta;

 


    $sql = "INSERT INTO ingredientes (nombre,cantidad,recetas_id) 
                    VALUES ('$nombre','$cantidad', '$receta')";
   
    
    $query=mysqli_query($con,$sql);

// Cierra la conexión a la base de datos

mysqli_close($con);
header("LOCATION:../cms.php?pag=crud-alimentacion&var=correct");
?>