<?php
    require("conexion.php");
    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $ocupacion = $_POST['ocupacion'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    
    // Verificar si se ha seleccionado una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = '../img/people/';
        
        // Mueve la imagen a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $carpeta_destino . $nombre_archivo)) {
            // Actualiza los valores en la tabla "historias" incluyendo la nueva imagen
            $sql = "UPDATE historias SET nombre = '$nombre', foto = '$nombre_archivo',apellidos = '$apellidos',
              edad = '$edad', peso = '$peso', altura = '$altura', ocupacion = '$ocupacion',
              descripcion = '$descripcion', genero = '$genero' WHERE id = $id";
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        // Actualiza los valores en la tabla "historias sin cambiar la imagen"
        $sql = "UPDATE historias SET nombre = '$nombre', apellidos = '$apellidos', 
        edad = '$edad', peso = '$peso', altura = '$altura', ocupacion = '$ocupacion', 
        descripcion = '$descripcion', genero = '$genero' WHERE id = $id";
    }
    
    if (mysqli_query($con, $sql)) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../cms.php?pag=crud-history-real-woman&var=correct");
?>