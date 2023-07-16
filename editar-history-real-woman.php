<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];
    $sql = "SELECT * FROM historias WHERE id = $id";
    $resultado = mysqli_query($con, $sql);
    
   
    $fila = mysqli_fetch_array($resultado);
    
    // Asignar los valores a las variables
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $foto = $fila['foto'];
    $edad = $fila['edad'];
    $peso = $fila['peso'];
    $altura = $fila['altura'];
    $ocupacion = $fila['ocupacion'];
    $descripcion = $fila['descripcion'];
    $genero = $fila['genero'];


?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-history-real.php" method="post" enctype="multipart/form-data">


                            <input type="hidden" placeholder="<?php echo $_GET['id']; ?>" name="id" class="btn-m" value="<?php echo $_GET['id']; ?>">

                            <label for="nombre" class="text-light">nombre</label>
                            <input type="text" placeholder="<?php echo $fila['nombre']; ?>" name="nombre" class="btn-m" value="<?php echo $fila['nombre']; ?>" id="nombre">

                            <label for="apellidos" class="text-light">apellidos</label>
                            <input type="text" placeholder="<?php echo $fila['apellidos']; ?>" name="apellidos" class="btn-m" value="<?php echo $fila['apellidos']; ?>" id="apellidos">

                            <label for="foto" class="text-light">imagen actual</label>
                            <input type="text" placeholder="<?php echo $fila['foto']; ?>" class="btn-m" disabled id="foto">

                            <label for="imagen" class="text-light">imagen para cambiar</label>
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m" id="imagen">

                            <label for="edad" class="text-light">edad</label>
                            <input type="text" placeholder="<?php echo $fila['edad']; ?>" name="edad" class="btn-m" value="<?php echo $fila['edad']; ?>" id="edad">

                            <label for="peso" class="text-light">peso</label>
                            <input type="text" placeholder="<?php echo $fila['peso']; ?>" name="peso" class="btn-m" value="<?php echo $fila['peso']; ?>" id="peso">

                            <label for="altura" class="text-light">altura</label>
                            <input type="text" placeholder="<?php echo $fila['altura']; ?>" name="altura" class="btn-m" value="<?php echo $fila['altura']; ?>" id="altura">

                            <label for="ocupacion" class="text-light">ocupacion</label>
                            <input type="text" placeholder="<?php echo $fila['ocupacion']; ?>" name="ocupacion" class="btn-m" value="<?php echo $fila['ocupacion']; ?>" id="ocupacion">

                            <label for="descripcion" class="text-light">descripcion</label>
                            <input type="text" placeholder="<?php echo $fila['descripcion']; ?>" name="descripcion" class="btn-m" value="<?php echo $fila['descripcion']; ?>" id="descripcion">

                       
                            <label for="genero" style="color:white">genero</label>

                            <label for="nombre" class="text-light">nombre</label>
                            <select name="genero" class="btn-m" id="genero">
                                
                                <option value="<?php echo $fila['genero']; ?>"><?php echo $fila['genero']; ?></option> 
                                <option value="F">MUJER</option> 
                                <option value="M">HOMBRE</option> 
                            </select>
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>