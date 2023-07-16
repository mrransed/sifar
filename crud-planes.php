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
                <a href="index.php?pag=crear-planes" class="primary-btn">insertar</a>

                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>nombre</th>
                                    <th>tipo de plan</th>
                                    <th>descripcion</th>
                                    <th>precio</th>
                                  
                                    <th>UD</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $sql="SELECT * FROM planes order by id desc";
                               

                                $query=mysqli_query($con,$sql);

                                while($res=mysqli_fetch_array($query)){
                                    $id=$res['id'];
                                    echo '<tr>';
                                   
                                    echo '<td class="class-time">';
                                    echo $res['nombre'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['tipo_plan'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['descripcion'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['precio'];
                                    echo '</td>';

                                  
                                    echo '<td  class="class-time">';
                                                                     
                                    echo '<a href="php/eliminar-planes.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    echo '<a href="index.php?pag=editar-planes&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    
                                   
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