<?php
require("php/conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la consulta a la base de datos para obtener el precio del producto con el ID proporcionado
    $query = mysqli_query($con, "SELECT precio FROM store WHERE id = '$id'") or die("error" . mysqli_Error($con));
    $res = mysqli_fetch_array($query);
    @$precio = $res['precio'];

    echo $precio;
}
?>