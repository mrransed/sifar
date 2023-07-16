<?php

require("conexion.php");

$id=$_GET['id'];

$sql = "DELETE FROM gastos WHERE id = $id";
    
    if (mysqli_query($con, $sql)) {
        echo "El registro se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../index.php?pag=crud-history-real-woman&var=correct");
?>