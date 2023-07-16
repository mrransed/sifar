<?php

    require("conexion.php");
    date_default_timezone_set("America/Bogota");
    $fechaActual = date('Y-m-d');
    $cedula=$_POST['cedula'];
    $abono=$_POST['abono'];
    $valorRestante=-$_POST['abono'];

    
$insertarPago=mysqli_query($con,"INSERT INTO 
abonos(cedula, fecha, monto, saldo_restante)
 VALUES ($cedula,'$fechaActual',$abono,$valorRestante)")
 or die("error en consulta 2".mysqli_error($con));

mysqli_close($con);
header("LOCATION:../index.php?pag=consultar-valor-restante&cedula=$cedula");




?>