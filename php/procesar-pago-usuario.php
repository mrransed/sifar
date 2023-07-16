<?php


      // Consultar los datos del registro
  require("conexion.php");
  date_default_timezone_set("America/Bogota");


  $fechaActual = date('Y-m-d');
  $horaActual = date('H:i:s');




  $id=$_POST['id'];

//   echo $id;

  $sql = "SELECT * FROM usuarios WHERE id = $id";
  $resultado = mysqli_query($con, $sql);
  
 
  $fila = mysqli_fetch_array($resultado);

 $idUsuario=$fila['id'];
 $nombreUsuario=$fila['nombre'];
 $apellidos=$fila['apellidos'];
 $email=$fila['email'];
 $cedula=$fila['cedula'];

 $nombreCliente=$nombreUsuario." ".$apellidos;




 $planes_id=$fila['planes_id'];

 $queryPlan="SELECT pla.id as id,pla.nombre as nombre,pla.tipo_plan as tipo,pla.precio as precio FROM planes as pla INNER JOIN  usuarios as usu ON usu.planes_id=pla.id where 
 usu.planes_id='$planes_id'";

$res = mysqli_query($con, $queryPlan);


$filas = mysqli_fetch_array($res);


$idPlan=$filas['id'];
$nombrePlan=$filas['nombre'];
$tipoPlan=$filas['tipo'];
$precio=$filas['precio'];

if($tipoPlan=='mensual'){
    $fechaSumada = date('Y-m-d', strtotime('+30 days', strtotime($fechaActual)));
}

if($tipoPlan=='15 dias'){
    $fechaSumada = date('Y-m-d', strtotime('+15 days', strtotime($fechaActual)));
    // $fechaSumada = date('Y-m-d H:i:s', strtotime('+15 days', strtotime($fechaActual)));
}
if($tipoPlan=='anual'){
    $fechaSumada = date('Y-m-d', strtotime('+365 days', strtotime($fechaActual)));
}



$insertarPago=mysqli_query($con,"INSERT INTO 
pagos(nombre_cliente,cedula, email_cliente, fecha_pago,hora_pago,fecha_de_pago, plan_de_pago, monto)
 VALUES ('$nombreCliente',$cedula,'$email','$fechaActual','$horaActual','$fechaSumada',$idPlan,$precio)")
 or die("error en consulta 2".mysqli_error($con));

mysqli_close($con);
header("LOCATION:../index.php?pag=crud-pagos&var=correct");

?>