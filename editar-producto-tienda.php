<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $sql = "SELECT * FROM store WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    $nombre = $fila['nombre'];
    $descripcion = $fila['descripcion'];
    $foto = $fila['imagen'];
    $precio = $fila['precio'];
   

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-producto-tienda.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>" id="">

                            <label for="nombre" class="text-light">nombre</label>
                            <input type="text" placeholder="<?php echo $fila['nombre']; ?>" name="nombre" class="btn-m" value="<?php echo $fila['nombre']; ?>" id="nombre">

                            <label for="descripcion" class="text-light">descripcion</label>
                            <input type="text" placeholder="<?php echo $fila['descripcion']; ?>" name="descripcion" class="btn-m" value="<?php echo $fila['descripcion']; ?>" id="descripcion">

                            <label for="imagenA" class="text-light">imagen actual</label>
                            <input type="text" placeholder="<?php echo $fila['imagen']; ?>" class="btn-m" disabled id="imagenA">

                            <label for="imagen" class="text-light">imagen para cambiar</label>
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m" id="imagen">

                            <label for="precio" class="text-light">precio</label>
                            <input type="text" placeholder="<?php echo $fila['precio']; ?>" name="precio" class="btn-m" value="<?php echo $fila['precio']; ?>" id="precio">
                      
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>