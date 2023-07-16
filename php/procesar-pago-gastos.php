<?php
require("conexion.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar el campo "pago" en la base de datos
    foreach ($_POST['confirmar_pago'] as $idGasto => $valorPago) {
        $pago = ($valorPago == 'on') ? 'Si' : 'No';
        $actualizar = mysqli_query($con, "UPDATE gastos SET pago='$pago' WHERE id=$idGasto") or die("Problemas en el update:" . mysqli_error($con));
    }
}

mysqli_close($con);
header("LOCATION:../index.php?pag=alerta-gastos&var=correct");
?>