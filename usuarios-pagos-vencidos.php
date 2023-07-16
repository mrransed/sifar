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
                                    <th>cedula </th>
                                    <th>email</th>
                                    <th>fecha pago</th>
                                    <th>fecha debe pagar</th>
                                    <th>plan pago</th>
                                    <th>telefono</th>
                                    <th>monto</th>
                                   
                                    <th>MUD</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                
                                date_default_timezone_set("America/Bogota");

                                $fechaActual = date('Y-m-d');

                                
                                
                                $sql="SELECT * FROM pagos AS pag INNER JOIN planes as plan 
                                ON plan.id=pag.plan_de_pago INNER JOIN usuarios AS usu ON 
                                usu.cedula=pag.cedula  WHERE pag.fecha_pago=(SELECT MAX(pag.fecha_pago) FROM pagos AS pag2) AND fecha_de_pago=CURDATE()";

                                 
                             
                                                        

                                $query=mysqli_query($con,$sql);

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
                                    echo $res['fecha_de_pago'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['tipo_plan'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['telefono'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['monto'];
                                    echo '</td>';

                                    

                                 

                                    echo '<td class="class-time">';
                                    
                                    // echo '<a href="php/eliminar-usuarios.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    // echo '<a href="index.php?pag=editar-usuarios&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    echo '<a href="https://api.whatsapp.com/send?phone='.$res['telefono'].'&text=Hola este es un mensaje para que recuerdes que tu fecha de pago de mensualidad o plan esta vencido" target="__blank">'.'<img src="./img/icons/mensaje.png" alt="">'.'</a>';
                           

                                   
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