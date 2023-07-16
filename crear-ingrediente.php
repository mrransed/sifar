<?php
    // Consultar los datos del registro
    require("php/conexion.php");

    $sql = "SELECT * FROM recetas";
    $resultado = mysqli_query($con, $sql);
    
   

    


?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-ingrediente.php" method="post">
                            <label for="receta" ><span class="text-light">Selecione la receta a agregar el ingrediente</span></label>
                            <select name="receta" id="receta"  class="custom-select mb-2">
                                <?php
                                    
                                    while($rec=mysqli_fetch_array($resultado)){
                                        
                                        echo '<option value="'.$rec['id'].'">'.$rec['nombre'].'</option>';

                                    }

                                ?>
                            </select>
                            <label for="ingrediente" ><span class="text-light">INGREDIENTES</span></label>
                            <input type="text" placeholder="nombre" name="nombre" class="btn-m" id="ingrediente">
                            <input type="text" placeholder="cantidad" name="cantidad" class="btn-m">
                           
                                          
                                                   
                            <button type="submit" class="btn-m">crear</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>