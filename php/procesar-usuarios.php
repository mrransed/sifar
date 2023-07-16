<?php

require("conexion.php");


    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direcion = $_POST['direcion'];
    $edad = $_POST['edad'] ? $_POST['edad'] : 0;
    $peso = $_POST['peso'] ? $_POST['peso'] : 0;
    $altura = $_POST['altura'] ? $_POST['altura'] : 0;
    // $imc = $_POST['imc'] ? $_POST['imc'] : 0;
    $planes = $_POST['planes'];


    if($altura==0 || $peso==0 ){
        $imc=0;
    }else{

        $alturaMetros = $altura / 100;
        $imc = $peso / ($altura * $alturaMetros);
        $imc = round($imc, 2); // Redondear el IMC a 2 decimales
    }
   
   
   
    
    // Verifica si se ha seleccionado una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];
        $carpeta_destino = '../img/people/';
        
        // Mueve la imagen a la carpeta de destino
        if (copy($ruta_temporal, $carpeta_destino . $nombre_archivo)) {
            // Realiza la inserción en la tabla "historias"
            $sql = "INSERT INTO usuarios (nombre, apellidos,cedula, 
            tipo, email, foto, telefono, direcion, edad,
            peso, unidad_peso, altura, unidad_altura, imc, 
            planes_id) 
                    VALUES ('$nombre','$apellidos','$cedula',2, 
                    '$email','$nombre_archivo','$telefono',
                    '$direcion',$edad,$peso,'kg',$altura,'cm','$imc',$planes)";
            
            if (mysqli_query($con, $sql)) {
                echo "La historia se ha insertado correctamente.";
            } else {
                echo "Error al insertar la historia: " . mysqli_error($con);
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado una imagen válida.";
        $sql2= "INSERT INTO usuarios (nombre, apellidos,cedula, 
            tipo, email, telefono, direcion, edad,
            peso, unidad_peso, altura, unidad_altura, imc, 
            planes_id) 
                    VALUES ('$nombre','$apellidos','$cedula',2, 
                    '$email','$telefono',
                    '$direcion',$edad,$peso,'kg',$altura,'cm','$imc',$planes)";
mysqli_query($con, $sql2);
      


    if (mysqli_errno($con) == 1062) {
        echo "Error: El usuario ya está duplicado.";
        header("LOCATION:../index.php?pag=crud-usuarios&var=duplicado");
    }

        
}


//esta parte es donde realiza el pago

$fechaActual=$_POST['fecha'];
$horaActual = date('H:i:s');

$sql = "SELECT * FROM usuarios WHERE cedula = $cedula";
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


// Cierra la conexión a la base de datos
mysqli_close($con);
header("LOCATION:../index.php?pag=crud-usuarios&var=correct");
?>