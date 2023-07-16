<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $sql = "SELECT * FROM planes WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    $nombre = $fila['nombre'];
    $tipoPlan = $fila['tipo_plan'];
    $descripcion = $fila['descripcion'];
    $precio = $fila['precio'];
   

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-planes.php" method="post" enctype="multipart/form-data">

                     id=""
                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>">

                            <label for="nombre" class="text-light">nombre</label>
                            <input type="text" placeholder="<?php echo $fila['nombre']; ?>" name="nombre" class="btn-m" value="<?php echo $fila['nombre']; ?>" id="nombre">

                            <label for="tipoPlan" class="text-light">tipo plan</label>
                            <select name="tipoPlan" class="custom-select mb-2" id="tipoPlan">
                                <?php
                                    $querySql=mysqli_query($con,"SELECT * FROM planes");
                                    while($reg=mysqli_fetch_array($querySql)){
                                        echo '<option value="'.$fila['tipo_plan'].'">'.$fila['tipo_plan'].'</option>';
                                    }
                                ?>
                               
                            
                            </select>

                            <label for="descripcion" class="text-light">descripcion</label>
                            <input type="text" placeholder="<?php echo $fila['descripcion']; ?>" name="descripcion" class="btn-m" value="<?php echo $fila['descripcion']; ?>" id="descripcion">

                            <label for="precio" class="text-light">precio</label>
                            <input type="text" placeholder="<?php echo $fila['precio']; ?>" name="precio" class="btn-m" value="<?php echo $fila['precio']; ?>" id="precio">

                            
                            
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>