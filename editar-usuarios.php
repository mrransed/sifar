<?php
    // Consultar los datos del registro
    require("php/conexion.php");
    $id=$_GET['id'];

    $sql="SELECT usu.id as id,usu.nombre as nombre,usu.apellidos as apellidos,usu.cedula as cedula,usu.email as email,usu.foto as foto,usu.telefono as telefono,
    usu.direcion as direcion,usu.edad as edad,usu.peso as peso,usu.unidad_peso as uniP,usu.altura as altura,usu.unidad_altura as uniA,
    usu.imc as imc,pla.id as idPla,pla.tipo_plan as tipoPlan
     FROM planes as pla INNER JOIN  usuarios as usu ON usu.planes_id=pla.id WHERE usu.id='$id'";
    $query = mysqli_query($con, $sql);

    $res=mysqli_fetch_array($query);


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
    $tipoPlan = $res['tipoPlan'];
    $idPla = $res['idPla'];
   
  
   

?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-editar-usuarios.php" method="post" enctype="multipart/form-data">


                    <input type="hidden" placeholder="<?php echo $idUsu; ?>" name="id" class="btn-m" value="<?php echo $idUsu; ?>">

                    <label for="nombre" class="text-light">nombre</label>
                    <input type="text" placeholder="<?php echo $nombre; ?>" name="nombre" class="btn-m" value="<?php echo $nombre; ?>" id="nombre">

                    <label for="apellidos" class="text-light">apellidos</label>
                    <input type="text" placeholder="<?php echo $apellidos; ?>" name="apellidos" class="btn-m" value="<?php echo $apellidos; ?>" id="apellidos">

                    <label for="cedula" class="text-light">cedula</label>
                    <input type="text" placeholder="<?php echo $cedula; ?>" name="cedula" class="btn-m" value="<?php echo $cedula; ?>" id="cedula">

                    <label for="email" class="text-light">email</label>
                    <input type="text" placeholder="<?php echo $email; ?>" name="email" class="btn-m" value="<?php echo $email; ?>" id="email">

                    <label for="foto" class="text-light">foto</label>
                    <input type="text" placeholder="<?php echo $foto; ?>" name="foto" class="btn-m" value="<?php echo $foto; ?>" id="foto">

                    <label for="telefono" class="text-light">telefono</label>
                    <input type="text" placeholder="<?php echo $telefono; ?>" name="telefono" class="btn-m" value="<?php echo $telefono; ?>" id="telefono">

                    <label for="direccion" class="text-light">nombre</label>
                    <input type="text" placeholder="<?php echo $direccion; ?>" name="direccion" class="btn-m" value="<?php echo $direccion; ?>" id="direccion">

                    <label for="peso" class="text-light">peso</label>
                    <input type="text" placeholder="<?php echo $peso; ?>" name="peso" class="btn-m" value="<?php echo $peso; ?>" id="peso">

                    <label for="edad" class="text-light">edad</label>
                    <input type="text" placeholder="<?php echo $edad; ?>" name="edad" class="btn-m" value="<?php echo $edad; ?>" id="edad">

                   <label for="altura" class="text-light">altura</label>
                    <input type="text" placeholder="<?php echo $altura; ?>" name="altura" class="btn-m" value="<?php echo $altura; ?>" id="altura">
                    
                    <label for="imc" class="text-light">imc</label>
                    <input type="text" placeholder="<?php echo $imc; ?>" name="imc" class="btn-m" value="<?php echo $imc; ?>" id="imc">

                    <label for="planes" class="text-light">planes</label>
                    <select name="planes" id=""class="custom-select mb-2" required id="planes" >
                               
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

                      
                            
                            <button type="submit" class="btn-m">modificar</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>