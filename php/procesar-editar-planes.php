<?php
    require("conexion.php");
    $id=$_POST['id'];
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipoPlan = $_POST['tipoPlan'];

    $precio = $_POST['precio'];
    
   
        $sql = "UPDATE planes SET nombre = '$nombre',tipo_plan='$tipoPlan',descripcion = '$descripcion',
              precio = '$precio' WHERE id = $id";

  
    if (mysqli_query($con, $sql)) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../index.php?pag=crud-planes&var=correct");
?>