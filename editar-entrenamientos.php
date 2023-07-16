<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $sql = "SELECT * FROM rutinas WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    
    $nombre = $fila['nombre'];
    $descripcion = $fila['descripcion'];
    $foto = $fila['imagen'];
    $series = $fila['series'];
    $repeticion = $fila['repeticion'];


?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-entrenamientos.php" method="post" enctype="multipart/form-data">

                          
                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>" id="">

                            <label for="nombre" class="text-light">nombre</label>
                            <input type="text" placeholder="<?php echo $fila['nombre']; ?>" name="nombre" class="btn-m" value="<?php echo $fila['nombre']; ?>" id="nombre">

                            <label for="descripcion" class="text-light">descripcion</label>
                            <input type="text" placeholder="<?php echo $fila['descripcion']; ?>" name="descripcion" class="btn-m" value="<?php echo $fila['descripcion']; ?>" id="descripcion">

                            <label for="imagenA" class="text-light">imagen actual</label>
                            <input type="text" placeholder="<?php echo $fila['imagen']; ?>" class="btn-m" disabled id="imagenA">

                            <label for="imagen" class="text-light">imagen para cambiar</label>
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m" id="imagen">

                            <label for="series" class="text-light">series</label>
                            <input type="text" placeholder="<?php echo $fila['series']; ?>" name="series" class="btn-m" value="<?php echo $fila['series']; ?>" id="series">

                            <label for="repeticion" class="text-light">repeticion</label>
                            <input type="text" placeholder="<?php echo $fila['repeticion']; ?>" name="repeticion" class="btn-m" value="<?php echo $fila['repeticion']; ?>" id="repeticion">
                                          
                                                   
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>