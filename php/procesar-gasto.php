<?php
require("conexion.php");


    $descripcion = $_POST['descripcion'];
    $valor = $_POST['valor'];
    $fecha_registro = date("Y-m-d");
    $fecha_pago = $_POST['fecha_pago'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $comentario = $_POST['comentario'];

    $insertar = mysqli_query($con, "INSERT INTO gastos (descripcion, valor, fecha_registro, fecha_pago, categoria, proveedor, comentario) VALUES ('$descripcion', '$valor', '$fecha_registro', '$fecha_pago', '$categoria', '$proveedor', '$comentario')") or die("Problemas en el insert:" . mysqli_error($con));

    if ($insertar) {
        echo "El gasto se ha creado correctamente.";
    } else {
        echo "Error al crear el gasto.";
    }
    mysqli_close($con);
    header("LOCATION:../index.php?pag=crud-gastos&var=correct");

?>
