<?php
require("conexion.php");

date_default_timezone_set("America/Bogota");
$fecha_pago = date('Y-m-d');
$producto_id = $_POST['productos'];
$cantidad = $_POST['cantidad'];
$cedula = $_POST['cedula'];

echo $cedula;


if (isset($_POST['comprar'])) {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
       

        $sql=mysqli_query($con,"SELECT * FROM store WHERE id='$producto_id'");
        $res=mysqli_fetch_array($sql);
        $valorProducto=$res['precio']*$cantidad;

        $tipoPago = $_POST['tipoPago'];

        if($tipoPago=="efectivo"){
            $monto = $valorProducto;
            $efectivo = $_POST['campoValor'];
            $devuelta = $valorProducto - $efectivo;
    
            if($devuelta<0){
                $restante=0;  
            }
            if($devuelta>0){
                $restante=abs($devuelta);
                $sql2 = "INSERT INTO abonos(cedula,fecha, monto, saldo_restante) VALUES ($cedula,'$fecha_pago',$efectivo,$restante)";
                mysqli_query($con, $sql2)or die("error en con 2".mysqli_error($con));

            }
            if($devuelta==0){
                $restante=0;
            }
        }else{
            $monto=$valorProducto;
            $efectivo=0;
            $devuelta=0;
            $restante=0;
        }
       
        
        echo $efectivo;
        echo $monto;
        echo $devuelta;
        echo $restante;
        echo '<br>';
        

    
    
        // Insertar los datos en la tabla pagosproductos
        $sql = "INSERT INTO pagosproductos (cedula, producto_id,tipoPago,fecha_pago,monto, efectivo, devuelta,restante)
                VALUES ('$cedula', '$producto_id','$tipoPago', '$fecha_pago',$monto,$efectivo,$devuelta,$restante)";
    
        if (mysqli_query($con, $sql)) {

            echo "Los datos se han insertado correctamente en la tabla pagosproductos.";
            header("Location: ../index.php?pag=" . "compras-productos" . "&devuelta=" . $devuelta);

    

        } else {
            echo "Error al insertar los datos en la tabla pagosproductos: " . mysqli_error($con);
        }
    }

    

    // Redireccionar a la página 1 con los valores de los inputs
    // header("Location: pagina1.php?pag=" . urlencode($valor1) . "&devuelta=" . $devuelta);
    // exit();

  } 

//   if (isset($_POST['agregar'])) {

    // echo "funciona 2";
    // header("Location: pagina1.php?valor1=" . urlencode($valor1) . "&valor2=" . urlencode($valor2));
    // exit();
    
//   } 




?>