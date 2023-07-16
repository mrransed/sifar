<?php
    
    require("php/conexion.php");
    
    $query=mysqli_query($con,"SELECT * FROM usuarios where cedula='$_POST[cedula]'");

    $res=mysqli_fetch_array($query);

    @$cedula=$res['cedula'];

    if($cedula){

        $idUsu = $res['id'];
        $nombre = $res['nombre'];
        $apellidos = $res['apellidos'];
        $cedula = $res['cedula'];
        $email = $res['email'];
        $foto = $res['foto'];
        $telefono = $res['telefono'];
        $direccion = $res['direcion'];
        $edad = $res['edad'];
        $peso = $res['peso'];
        $altura = $res['altura'];
        $imc = $res['imc'];
        $tipoPlan = $res['planes_id'];
      

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="index.php?pag=procesar-pago-clases" method="post" enctype="multipart/form-data">
                        <input type="hidden" placeholder="<?php echo $idUsu; ?>" name="id" class="btn-m" value="<?php echo $idUsu; ?>">
                        <input type="hidden" placeholder="usuario" name="usuario" class="btn-m" value="noNuevo">
                    <input type="text" placeholder="<?php echo $nombre; ?>" name="nombre" class="btn-m" value="<?php echo $nombre; ?>">
                    <input type="text" placeholder="<?php echo $apellidos; ?>" name="apellidos" class="btn-m" value="<?php echo $apellidos; ?>">
                    <input type="number" placeholder="cantidad clases que se va a pagar" name="clases" class="btn-m" required>
                    <input type="text" placeholder="<?php echo $cedula; ?>" name="cedula" class="btn-m" value="<?php echo $cedula; ?>">
                    <input type="text" placeholder="<?php echo $email; ?>" name="email" class="btn-m" value="<?php echo $email; ?>">
                    <input type="text" placeholder="<?php echo $telefono; ?>" name="telefono" class="btn-m" value="<?php echo $telefono; ?>">
                    <input type="text" placeholder="<?php echo $direccion; ?>" name="direccion" class="btn-m" value="<?php echo $direccion; ?>">
                    <input type="text" placeholder="<?php echo $peso; ?>" name="peso" class="btn-m" value="<?php echo $peso; ?>">
                    <input type="text" placeholder="<?php echo $edad; ?>" name="edad" class="btn-m" value="<?php echo $edad; ?>">
                 
                    <input type="text" placeholder="<?php echo $altura; ?>" name="altura" class="btn-m" value="<?php echo $altura; ?>">
                    
                    <input type="text" placeholder="<?php echo $imc; ?>" name="imc" class="btn-m" value="<?php echo $imc; ?>">
                    <select name="planes" id=""class="custom-select mb-2" required >
                               
                                <?php
                                    
                                    $query=mysqli_query($con,"SELECT * FROM planes where id='$idPla'")or die("error".mysqli_Error($con));
                                    while($res=mysqli_fetch_array($query)){

                                        echo '<option value="'.$res['id'].'">'.$res['tipo_plan'].'</option>';

                                    }
                                ?>

                                <?php
                                    
                                    $query=mysqli_query($con,"SELECT * FROM planes")or die("error".mysqli_Error($con));
                                    while($res=mysqli_fetch_array($query)){

                                        echo '<option value="'.$res['id'].'">'.$res['tipo_plan'].'</option>';

                                    }
                                ?>


                                
                                
                            </select>

                                               
                        
                        
                      
                          
                         
                                                       
                            <button type="submit" class="btn-m">ENTRAR</button>
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
                        <form action="index.php?pag=procesar-pago-clases" method="post" enctype="multipart/form-data">
                       
                    <input type="text" placeholder="nombre" name="nombre" class="btn-m">
                   
                    <input type="text" placeholder="apellidos" name="apellidos" class="btn-m">
                    <input type="number" placeholder="cantidad clases que se va a pagar" name="clases" class="btn-m" required>
                    <input type="text" placeholder="<?php echo $_POST['cedula']; ?>" name="cedula" class="btn-m" value="<?php echo $_POST['cedula']; ?>" disabled>
                    <input type="hidden" placeholder="<?php echo $_POST['cedula']; ?>" name="cedula" class="btn-m" value="<?php echo $_POST['cedula']; ?>">
                    <input type="hidden" placeholder="usuario" name="usuario" class="btn-m" value="Nuevo">
                    <input type="text" placeholder="email" name="email" class="btn-m" >
                    <input type="text" placeholder="telefono" name="telefono" class="btn-m">
                    <input type="text" placeholder="direccion" name="direccion" class="btn-m">
                    <input type="text" placeholder="peso" name="peso" class="btn-m" >
                    <input type="text" placeholder="edad" name="edad" class="btn-m">
                 
                    <input type="text" placeholder="altura" name="altura" class="btn-m">
                    
                    <input type="text" placeholder="imc" name="imc" class="btn-m">
                    <select name="planes" id="" class="custom-select mb-2" required >
                               
                               
                                <?php
                                    
                                    $query=mysqli_query($con,"SELECT * FROM planes")or die("error".mysqli_Error($con));
                                    while($res=mysqli_fetch_array($query)){

                                        echo '<option value="'.$res['id'].'">'.$res['tipo_plan'].'</option>';

                                    }
                                ?>


                                
                                
                            </select>

                                               
                        
                        
                      
                          
                         
                                                       
                            <button type="submit" class="btn-m">ENTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>




<?php

}

?>