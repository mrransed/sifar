<?php
 date_default_timezone_set("America/Bogota");

 require("php/conexion.php");
 $fechaActual = date('Y-m-d');
 $horaActual = date('H:i:s');

@$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$clases = $_POST['clases'];
$email = $_POST['email'];
@$foto = $_POST['foto'];
$telefono = $_POST['telefono'];
$direcion = $_POST['direccion'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = $_POST['imc'];
$tipoPlan = $_POST['planes'];
$usuario = $_POST['usuario'];

if($usuario=='noNuevo'){
    

    $query=mysqli_query($con,"SELECT * FROM usuarios WHERE cedula='$cedula'")or die("error en consulta 2".mysqli_error($con));

    $res=mysqli_fetch_array($query);

    $nombreUsuario=$res['nombre'];
    $idUsuario=$res['id'];
    
    $apellidos=$res['apellidos'];
    $email=$res['email'];
    $cedula=$res['cedula'];
    $nombreCliente=$nombreUsuario." ".$apellidos;
    $planes_id=$res['planes_id'];


    if($nombre){


        $queryPlan="SELECT * FROM planes AS pla WHERE tipo_plan='clase' ";
        
        $reg = mysqli_query($con, $queryPlan);
        
        
        $filas = mysqli_fetch_array($reg);
        
        
        $idPlan=$filas['id'];
        $nombrePlan=$filas['nombre'];
        $tipoPlan=$filas['tipo_plan'];
        $precio=$filas['precio']*$clases;
        
        echo $precio;
        // $fechaSumada = date('Y-m-d', strtotime('+30 days', strtotime($fechaActual)));   
        $fechaSumada ="dia";   
        
        
        
        $insertarPago=mysqli_query($con,"INSERT INTO 
        pagos(nombre_cliente,cedula, email_cliente, fecha_pago,hora_pago,fecha_de_pago, plan_de_pago, monto)
         VALUES ('$nombreCliente',$cedula,'$email','$fechaActual','$horaActual','$fechaSumada',$idPlan,$precio)")
         or die("error en consulta 2".mysqli_error($con));
        
        
            }

}else{


    $sql = "INSERT INTO usuarios (nombre, apellidos,cedula, 
    tipo, email,telefono, direcion, edad,
    peso, unidad_peso, altura, unidad_altura, imc, 
    planes_id) 
            VALUES ('$nombre','$apellidos','$cedula',2, 
            '$email','$telefono',
            '$direcion',$edad,$peso,'kg',$altura,'cm','$imc',$tipoPlan)";

    mysqli_query($con,$sql);



        $queryPlan="SELECT * FROM planes AS pla WHERE tipo_plan='clase' ";
        
        $reg = mysqli_query($con, $queryPlan);
        
        
        $filas = mysqli_fetch_array($reg);
        
        
        $idPlan=$filas['id'];
        $nombrePlan=$filas['nombre'];
        $tipoPlan=$filas['tipo_plan'];
        $precio=$filas['precio']*$clases;
        $nombreCliente=$nombre." ".$apellidos;


        echo $precio;

        // $fechaSumada = date('Y-m-d', strtotime('+30 days', strtotime($fechaActual)));   
        $fechaSumada ="dia";   
        
        
        
        $insertarPago=mysqli_query($con,"INSERT INTO 
        pagos(nombre_cliente,cedula, email_cliente, fecha_pago,hora_pago,fecha_de_pago, plan_de_pago, monto)
         VALUES ('$nombreCliente',$cedula,'$email','$fechaActual','$horaActual','$fechaSumada',$idPlan,$precio)")
         or die("error en consulta 2".mysqli_error($con));

      
mysqli_close($con);
// header("LOCATION:../index.php?pag=crud-usuarios&var=correct");
echo '<script>window.location.href = "index.php?pag=crear-pago-clases&var=correct";</script>';
} 



?>