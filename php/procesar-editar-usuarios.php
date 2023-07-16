<?php
require("conexion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$email = $_POST['email'];
$foto = $_POST['foto'];
$telefono = $_POST['telefono'];
$direcion = $_POST['direccion'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = $_POST['imc'];
$tipoPlan = $_POST['planes'];


   

// Verificar si se ha seleccionado una nueva imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $carpeta_destino = '../img/people/';

    // Mueve la imagen a la carpeta de destino
    if (move_uploaded_file($ruta_temporal, $carpeta_destino . $nombre_archivo)) {
        // Actualiza los valores en la tabla "historias" incluyendo la nueva imagen
        $sql = "UPDATE usuarios SET nombre = '$nombre',apellidos='$apellidos',cedula='$cedula',email='$email', foto = '$nombre_archivo',
        telefono = '$telefono',direcion = '$direcion',edad = '$edad',peso = '$peso',
         altura = '$altura',imc = '$imc',planes_id = '$tipoPlan' WHERE id = $id";
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    // Actualiza los valores en la tabla "historias" sin cambiar la imagen
    $sql = "UPDATE usuarios SET nombre = '$nombre',apellidos='$apellidos',cedula='$cedula',email='$email',
    telefono = '$telefono',direcion = '$direcion',edad = '$edad',peso = '$peso',
     altura = '$altura',imc = '$imc',planes_id = '$tipoPlan' WHERE id = $id";
}

if (mysqli_query($con, $sql)) {
    echo "Los datos se han actualizado correctamente.";
} else {
    echo "Error al actualizar los datos: " . mysqli_error($con);
}

// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../index.php?pag=crud-usuarios&var=correct");


?>