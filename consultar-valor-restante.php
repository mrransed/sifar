<?php

$cedula=$_REQUEST['cedula'];


  // Consultar los datos del registro
  require("php/conexion.php");

  $sql = "SELECT sum(saldo_restante) as restante FROM abonos WHERE cedula = '$cedula'";

  $resultado = mysqli_query($con, $sql);
  $fila = mysqli_fetch_array($resultado);
  $restante=$fila['restante'];
//   echo $restante;
  
 



 $queryPlan="SELECT usu.nombre as nombre FROM usuarios as usu where usu.cedula='$cedula'";

$res = mysqli_query($con, $queryPlan);


$filas = mysqli_fetch_array($res);


$nombreUsuario=$filas['nombre'];
  

?>

<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
           
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-pago-abono.php" method="post" enctype="multipart/form-data">
                          
                            <label for=""><h3 class="text-light">El usuario <?php  echo $nombreUsuario." ";   ?> </h3></label>            
                            <label for=""><h3 class="text-light">debe  <?php  echo $restante;   ?> </h3></label>   
                            <br>         
                            
                            <label for="abono"><h3 class="text-light">valor abonar</h3></label>   
                            <input type="number" name="abono" class="btn-m" placeholder="valor abonar" id="abono">   
                            <input type="hidden" name="cedula" class="btn-m" value="<?php echo $cedula; ?>">
                           
                            <!-- <input type="hidden" name="id" class="btn-m" value="<?php echo $fila['id']; ?>">                        -->
                            <button type="submit" class="btn-m">pagar abono</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>
 

