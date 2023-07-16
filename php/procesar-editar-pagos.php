<?php
    require("conexion.php");
    $id=$_POST['id'];
    
    $nombre_cliente = $_POST['nombre_cliente'];
    $cedula = $_POST['cedula'];
    $email_cliente = $_POST['email_cliente'];
    $fecha_pago = $_POST['fecha_pago'];
   
   
    $fecha_pago=date('Y-m-d', strtotime($fecha_pago));
    
    echo $fecha_pago;

    $plan_de_pago = $_POST['plan_de_pago'];
    $monto = $_POST['monto'];

    echo $plan_de_pago;
       
    $sql = "SELECT * FROM planes WHERE id = $plan_de_pago";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    $nombre = $fila['nombre'];
    $tipoPlan = $fila['tipo_plan'];
    $descripcion = $fila['descripcion'];
    $precio = $fila['precio'];

    if($tipoPlan=='mensual'){
        $fecha_de_pago = date('Y-m-d', strtotime('+30 days', strtotime($fecha_pago)));
    }

    if($tipoPlan=='15 dias'){
        $fecha_de_pago = date('Y-m-d', strtotime('+15 days', strtotime($fecha_pago)));
        // $fechaSumada = date('Y-m-d H:i:s', strtotime('+15 days', strtotime($fechaActual)));
    }
    if($tipoPlan=='anual'){
        $fecha_de_pago = date('Y-m-d', strtotime('+365 days', strtotime($fecha_pago)));
    }

   
        $sql = "UPDATE pagos SET nombre_cliente = '$nombre_cliente',cedula='$cedula',email_cliente = '$email_cliente',
              fecha_pago = '$fecha_pago',fecha_de_pago='$fecha_de_pago',plan_de_pago='$plan_de_pago',monto='$monto' WHERE id = $id";

  
    if (mysqli_query($con, $sql)) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../index.php?pag=crud-pagos&var=correct");
?>