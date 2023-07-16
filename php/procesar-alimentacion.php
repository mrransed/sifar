<?php

require("conexion.php");

if ($con->connect_error) {
    die("Error de conexión a la base de datos: " . $con->connect_error);
}



    $nombre = $_POST['nombre'];
    $instruciones = $_POST['instruciones'];

  
   
    
    // Verifica si se ha seleccionado una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = '../img/people/';
        
        // Mueve la imagen a la carpeta de destino
        if (copy($ruta_temporal, $carpeta_destino . $nombre_archivo)) {
            // Realiza la inserción en la tabla "historias"
            $sql = "INSERT INTO recetas (nombre,imagen,instruciones) 
                    VALUES ('$nombre','$nombre_archivo', '$instruciones')";
            
            if (mysqli_query($con, $sql)) {
                echo "La historia se ha insertado correctamente.";
            } else {
                echo "Error al insertar la historia: " . mysqli_error($con);
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado una imagen válida.";
    }


// Cierra la conexión a la base de datos

mysqli_close($con);
header("LOCATION:../cms.php?pag=crud-alimentacion&var=correct");
?>