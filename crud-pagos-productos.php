<section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>sysGym</span>
                        <h2>consulta pagos productos</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="table-controls">
                        <!-- <ul> -->
                            <!-- <li class="active" data-tsfilter="all">All event</li>
                            <li data-tsfilter="fitness">Fitness tips</li>
                            <li data-tsfilter="motivation">Motivation</li>
                            <li data-tsfilter="workout">Workout</li> -->
                        <!-- </ul> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <a href="index.php?pag=compras-productos" class="primary-btn">insertar</a>

                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>nombre cliente</th>
                                    <th>cedula</th>
                                    <th>producto</th>
                                    <th>tipoPago</th>
                                    <th>fecha pago</th>
                                    <th>valor producto</th>
                                    <th>valor pagado</th>
                                    <th>restante</th>
                                  
                                    <th>UD</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $sql="SELECT pag.id as id,usu.nombre as nombre,usu.cedula as cedula,sto.nombre as producto,pag.tipoPago as tipoPago,
                                pag.fecha_pago as fechaPago,pag.monto as monto,pag.efectivo as efectivo,pag.restante as restante                           
                                 FROM pagosproductos AS pag INNER JOIN usuarios as usu ON pag.cedula=usu.cedula
                                INNER JOIN store sto ON pag.producto_id=sto.id order by pag.id desc";
                               

                              


                                $query=mysqli_query($con,$sql);

                                while($res=mysqli_fetch_array($query)){
                                    $id=$res['id'];
                                    echo '<tr>';
                                   
                                    echo '<td class="class-time">';
                                    echo $res['nombre'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['cedula'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['producto'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['tipoPago'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['fechaPago'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['monto'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['efectivo'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['restante'];
                                    echo '</td>';
                                  
                                  
                                    echo '<td  class="class-time">';
                                                                     
                                    echo '<a href="php/eliminar-pagos-productos.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    // echo '<a href="index.php?pag=editar-pagos&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    
                                   
                                    echo '</td>';
                                  
                                echo '</tr>';                                  
                                }
                            ?>
                                

                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>