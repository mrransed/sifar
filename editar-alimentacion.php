<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $idIng=$_GET['idIng'];

    $sql = "SELECT * FROM recetas WHERE id = $id";
    $resultado = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM ingredientes WHERE id = $idIng";
    $resultado2 = mysqli_query($con, $sql2);
    

    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    $nombre = $fila['nombre'];
    $imagen = $fila['imagen'];
    $instruciones = $fila['instruciones'];
    
    $fila2 = mysqli_fetch_array($resultado2);
    
    // Asignar los valores a las variables
    $ingrediente = $fila2['nombre'];
    $cantidad = $fila2['cantidad'];
    

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-alimentacion.php" method="post" enctype="multipart/form-data">
                            
                   
                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" placeholder="<?php echo $_GET['idIng']; ?>" name="idi" class="btn-m" value="<?php echo $_GET['idIng']; ?>">
                            
                            <label for="nombre" class="text-light">nombre</label>
                            <input type="text" placeholder="<?php echo $fila['nombre']; ?>" name="nombre" class="btn-m" value="<?php echo $fila['nombre']; ?>" id="nombre">
                            <label for="nominstrucionesbre" class="text-light">instruciones</label>
                            <input type="text" placeholder="<?php echo $fila['instruciones']; ?>" name="instruciones" class="btn-m" value="<?php echo $fila['instruciones']; ?>" id="instruciones">

                            <label for="imagen" class="text-light">imagen actual</label>
                            <input type="text" placeholder="<?php echo $fila['imagen']; ?>" class="btn-m" disabled id="imagen">
                           
                            <label for="imagenA" class="text-light">cambiar imagen</label>
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m" id="imagenA">

                            <label for="nombreI" class="text-light">nombre ingrediente</label>
                            <input type="text" placeholder="<?php echo $fila2['nombre']; ?>" name="ingrediente" class="btn-m" value="<?php echo $fila2['nombre']; ?>" id="nombreI">

                            <label for="cantidad" class="text-light">cantidad ingrediente</label>
                            <input type="text" placeholder="<?php echo $fila2['cantidad']; ?>" name="cantidad" class="btn-m" value="<?php echo $fila2['cantidad']; ?>" id="cantidad">
                       
                           
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>