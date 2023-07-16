<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-usuarios.php" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="nombre" name="nombre" class="btn-m">
                            <input type="text" placeholder="apellidos" name="apellidos" class="btn-m">
                            <input type="number" placeholder="cedula" name="cedula" class="btn-m">
                            <input type="date" placeholder="fecha" name="fecha" class="btn-m" style="background-color:white;">
                            <input type="email" placeholder="email" name="email" class="btn-m">
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m">
                            <input type="number" placeholder="telefono" name="telefono" class="btn-m">
                            <input type="text" placeholder="direccion" name="direcion" class="btn-m">
                            <input type="number" placeholder="edad" name="edad" class="btn-m">
                            <input type="number" placeholder="peso" name="peso" class="btn-m" step="any">
                            <input type="number" placeholder="altura" name="altura" class="btn-m" step="any">
                            <!-- <input type="number" placeholder="imc" name="imc" class="btn-m"> -->
                            <select name="planes" id=""class="custom-select mb-2" required >
                                <option value="">selecione una opcion</option>
                                <?php
                                    require("php/conexion.php");
                                    $query=mysqli_query($con,"SELECT * FROM planes")or die("error".mysqli_Error($con));
                                    while($res=mysqli_fetch_array($query)){

                                        echo '<option value="'.$res['id'].'">'.$res['nombre'].'</option>';

                                    }
                                ?>
                            </select>
                         
                                                       
                            <button type="submit" class="btn-m">ENTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>