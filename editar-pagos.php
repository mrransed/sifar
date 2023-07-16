<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $sql = "SELECT * FROM pagos WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables

    $nombre = $fila['nombre_cliente'];
    $cedula = $fila['cedula'];
    $email_cliente = $fila['email_cliente'];
    $fecha_pago = $fila['fecha_pago'];
    $fecha_de_pago = $fila['fecha_de_pago'];
    $plan_de_pago = $fila['plan_de_pago'];
    $monto = $fila['monto'];
   

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-pagos.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>">

                            <label for="nombre_cliente" class="text-light">nombre del cliente</label>
                            <input type="text" placeholder="<?php echo $fila['nombre_cliente']; ?>" name="nombre_cliente" id="nombre_cliente" class="btn-m" value="<?php echo $fila['nombre_cliente']; ?>">
                            <label for="cedula" class="text-light">cedula</label>
                            <input type="text" placeholder="<?php echo $fila['cedula']; ?>" name="cedula" class="btn-m" id="cedula" value="<?php echo $fila['cedula']; ?>">
                            <label for="email_cliente" class="text-light">email del cliente</label>
                            <input type="text" placeholder="<?php echo $fila['email_cliente']; ?>" name="email_cliente" class="btn-m"  id="email_cliente" value="<?php echo $fila['email_cliente']; ?>">
                            <label for="fecha_pago" class="text-light">fecha pago</label>
                            <input type="date" placeholder="<?php echo $fila['fecha_pago']; ?>" name="fecha_pago" class="btn-m" id="fecha_pago" value="<?php echo $fila['fecha_pago']; ?>" style="background-color: white;">
                            <label for="fecha_de_pago" class="text-light">fecha debe pagar</label>
                            <input type="date" placeholder="<?php echo $fila['fecha_de_pago']; ?>" name="fecha_de_pago" class="btn-m" id="fecha_de_pago" value="<?php echo $fila['fecha_de_pago']; ?>" style="background-color: white;" disabled>
                            <label for="plan_de_pago" class="text-light">plan de pago</label>
                            <select name="plan_de_pago" class="custom-select mb-2 " id="plan_de_pago">
                                <?php
                                    $querySql=mysqli_query($con,"SELECT * FROM planes");
                                    while($reg=mysqli_fetch_array($querySql)){
                                        echo '<option value="'.$reg['id'].'">'.$reg['tipo_plan'].'</option>';
                                    }
                                ?>
                               
                            
                            </select>
                            <label for="monto" class="text-light">valor pago</label>
                            <input type="text" placeholder="<?php echo $fila['monto']; ?>" name="monto" class="btn-m" id="monto" value="<?php echo $fila['monto']; ?>">

                            
                            
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>