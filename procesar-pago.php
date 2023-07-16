<?php

$cedula=$_POST['cedula'];


  // Consultar los datos del registro
  require("php/conexion.php");

  $sql = "SELECT * FROM usuarios WHERE cedula = $cedula";
  $resultado = mysqli_query($con, $sql);
  
 
  $fila = mysqli_fetch_array($resultado);

 $idUsuario=$fila['id'];
 $nombreUsuario=$fila['nombre'];
 $planes_id=$fila['planes_id'];

 $queryPlan="SELECT pla.nombre as nombre,pla.tipo_plan as tipo FROM planes as pla INNER JOIN  usuarios as usu ON usu.planes_id=pla.id where 
 usu.planes_id='$planes_id'";

$res = mysqli_query($con, $queryPlan);


$filas = mysqli_fetch_array($res);


$nombrePlan=$filas['nombre'];
$tipoPlan=$filas['tipo'];

  
if($nombreUsuario){






?>

<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
           
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-pago-usuario.php" method="post" enctype="multipart/form-data">
                          
                            <label for=""><h3 class="text-light">El usuario <?php  echo $nombreUsuario." ";   ?> </h3></label>            
                            <label for=""><h3 class="text-light">es  <?php  echo $nombrePlan;   ?> </h3></label>   
                            <br>         
                            <label for=""><h3 class="text-light">Tiene un plan de tipo  <?php  echo $tipoPlan;   ?> </h3></label>  
                            <input type="hidden" name="id" class="btn-m" value="<?php echo $fila['id']; ?>">                       
                            <button type="submit" class="btn-m">pagar plan</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>

    <?php

}else{

?>



<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
           
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-entrenamientos.php" method="post" enctype="multipart/form-data">
                          
                            <label for=""><h3 class="text-light">El usuario no existe </h3></label>            
                           
                        </form>
                    </div>
                </div>
            </div>
           
    </section>


    <?php

}
?>