<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form method="POST" action="php/comprar-productos.php">
                        <label id="" ><h3 class="text-light"><?php if(@$_GET['devuelta']<0){echo "se debe devolver:".abs($_GET['devuelta']);}   
                        if(@$_GET['devuelta']>0){echo "el cliente quedo debiendo:".abs($_GET['devuelta']);} if(@$_GET['devuelta']==0){}?>
                        </h3></label>

                        <input type="number" placeholder="cedula" name="cedula" class="btn-m" required>
                        
                            <label id="precioLabel" class="text-light"></label>

                            <select name="productos"  class="custom-select mb-2" onchange="mostrarPrecio()" required >
                               <option value="">Selecione una opcion</option>
                               <?php
                                   require("php/conexion.php");
                                   $query=mysqli_query($con,"SELECT * FROM store")or die("error".mysqli_Error($con));
                                   while($res=mysqli_fetch_array($query)){

                                       echo '<option value="'.$res['id'].'">'.$res['nombre'].'</option>';

                                   }
                               ?>
                              </select>


                              <select name="tipoPago"  class="custom-select mb-2" onchange="mostrarCampo()"  required >
                               
                              

                               <option value="">selecione una opcion de pago</option>
                               <option value="efectivo">efectivo</option>
                               <option value="tarjeta de credito">tarjeta de credito</option>
                               <option value="nequi">nequi</option>

                           
                       

                                                    
                       
                   </select>

                   <!-- <select name="tipoPago"  class="custom-select mb-2" onchange="mostrarCampo()"  required >
                               
                              

                               <option value="">Selecione una opcion de compra</option>
                               <option value="contado">Al contado</option>
                               <option value="fiado">fiado</option>
                                                         
                       

                                                    
                       
                   </select> -->

                            <input type="number" placeholder="cantidad" name="cantidad" class="btn-m" required>
                            <input type="number" placeholder="valor del efectivo " name="campoValor" class="btn-m" id="campoValor"  style="display: none;" required>
                                                                                               
                                                       
                            <button type="submit" class="btn-m mb-2" id="btnEnviar1" name="comprar">COMPRAR</button>
                            
                            <!-- <button type="submit" class="btn-m" id="btnEnviar2" name="agregar">AGREGAR AL CARRO DE COMPRAS</button> -->
                        </form>
                    </div>
                </div>
            </div>
           
    </section>
  
 