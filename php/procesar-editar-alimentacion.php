<?php
    require("conexion.php");
    $id=$_POST['id'];
    $idIng=$_POST['idi'];

      
    $nombre = $_POST['nombre'];
    $instruciones = $_POST['instruciones'];
    $ingrediente = $_POST['ingrediente'];
    $cantidad = $_POST['cantidad'];
 
    



    
    // Verificar si se ha seleccionado una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = '../img/people/';
        
        // Mueve la imagen a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $carpeta_destino . $nombre_archivo)) {
            // Actualiza los valores en la tabla "historias" incluyendo la nueva imagen
            $sql = "UPDATE recetas SET nombre = '$nombre', imagen = '$nombre_archivo', instruciones= '$instruciones'
             WHERE id = $id";
            
            $sql2 = "UPDATE ingredientes SET nombre = '$nombre', cantidad = '$cantidad'  WHERE id = $idIng";


        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        // Actualiza los valores en la tabla "historias sin cambiar la imagen"
        $sql = "UPDATE recetas SET nombre = '$nombre',instruciones= '$instruciones'
             WHERE id = $id";

        $sql2 = "UPDATE ingredientes SET nombre = '$nombre', cantidad = '$cantidad'  WHERE id = $idIng";
    }
    
    if (mysqli_query($con, $sql)) {
        mysqli_query($con, $sql2);
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../cms.php?pag=crud-alimentacion&var=correct");
?>