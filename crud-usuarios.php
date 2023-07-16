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
                <a href="index.php?pag=crear-usuarios" class="primary-btn">insertar</a>

                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>nombre</th>
                                    <th>apellidos</th>
                                    <th>cedula</th>
                                    <th>email</th>
                                    <th>foto</th>
                                    <th>telefono</th>
                                    <th>direcion</th>
                                    <th>edad</th>
                                    <th>peso</th>
                                    <th>unidad peso</th>
                                    <th>altura</th>
                                    <th>unidad altura</th>
                                    <th>imc</th>
                                    <th>plan</th>
                                    <th>UD</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $sql="SELECT usu.id as id,usu.nombre as nombre,usu.apellidos as apellidos,usu.cedula as cedula,usu.email as email,usu.foto as foto,usu.telefono as telefono,
                                usu.direcion as direcion,usu.edad as edad,usu.peso as peso,usu.unidad_peso as uniP,usu.altura as altura,usu.unidad_altura as uniA,usu.imc as imc,pla.tipo_plan as tipoPlan
                                 FROM planes as pla INNER JOIN  usuarios as usu ON usu.planes_id=pla.id order by usu.id desc";
                               

                                $query=mysqli_query($con,$sql);

                                while($res=mysqli_fetch_array($query)){
                                    $id=$res['id'];
                                    echo '<tr>';
                                   
                                    echo '<td class="class-time">';
                                    echo $res['nombre'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['apellidos'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['cedula'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['email'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['foto'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['telefono'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['direcion'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['edad'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['peso'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['uniP'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['altura'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['uniA'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['imc'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['tipoPlan'];
                                    echo '</td>';
                                    

                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    
                                    echo '<a href="php/eliminar-usuarios.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    echo '<a href="index.php?pag=editar-usuarios&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    
                                   
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