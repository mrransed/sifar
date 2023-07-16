<section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>sysGym</span>
                        <h2>usuarios</h2>
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
                <!-- <a href="index.php?pag=crear-usuarios" class="primary-btn">insertar</a> -->

                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                  
                                
                                    <th>nombre </th>
                                    <th>email</th>
                                    <th>fecha pago</th>
                                    <th>fecha debe pagar</th>
                                    <th>plan pago</th>
                                    <th>monto</th>
                                   
                                    <!-- <th>UD</th> -->
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                $cedula=$_POST['cedula'];

                                echo $cedula;

                                $sql="SELECT * FROM pagos AS pag INNER JOIN planes as plan 
                                ON plan.id=pag.plan_de_pago  WHERE pag.cedula='$cedula'";

                                                        

                                $query=mysqli_query($con,$sql)or die("error".mysqli_error($con));

                                while($res=mysqli_fetch_array($query)){
                                    $id=$res['id'];
                                    echo '<tr>';
                                   
                                    echo '<td class="class-time">';
                                    echo $res['nombre_cliente'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['cedula'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['email_cliente'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['fecha_pago'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['tipo_plan'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['monto'];
                                    echo '</td>';

                                    

                                 

                                    // echo '<td class="class-time">';
                                    
                                    // echo '<a href="php/eliminar-usuarios.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    // echo '<a href="index.php?pag=editar-usuarios&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    
                                   
                                    // echo '</td>';
                                  
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