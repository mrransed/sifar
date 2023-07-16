<section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>SISTEMA MANEJADOR DE CONTENIDO</span>
                        <h2>Recetas</h2>
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
                <a href="cms.php?pag=crear-alimentacion" class="primary-btn">insertar receta</a>
                <a href="cms.php?pag=crear-ingrediente" class="primary-btn">insertar ingrediente</a>

                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>nombre</th>
                                    <th>imagen</th>
                                    <th>instruciones</th>
                                    <th>ingrediente</th>
                                    <th>cantidad</th>
                                  
                                    <th>UD</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                $sql="SELECT rec.id as id,rec.nombre as nombre,ing.nombre as nombreRec,
                                 rec.imagen as imagen,rec.instruciones as instruciones, ing.id as idIng,
                                 ing.nombre as ingrediente,ing.cantidad as cantidad
                                FROM recetas as rec INNER JOIN 
                                ingredientes as ing ON ing.recetas_id = rec.id order by rec.id desc";  

                                $query=mysqli_query($con,$sql);

                                while($res=mysqli_fetch_array($query)){
                                    $id=$res['id'];
                                    $idIng=$res['idIng'];
                                    echo '<tr>';
                                   
                                    echo '<td class="class-time">';
                                    echo $res['nombre'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['imagen'];
                                    echo '</td>';
                                    
                                    echo '<td class="class-time">';
                                    echo $res['instruciones'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['ingrediente'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['cantidad'];
                                    echo '</td>';
                                 

                                   
                                    
                                    echo '<td class="class-time">';
                                    
                                    echo '<a href="php/eliminar-alimentacion.php?id='.$id.'">'.'<img src="./img/icons/eliminar.png" alt="">'.'</a>';
                                    echo '<a href="cms.php?pag=editar-alimentacion&id='.$id.'&idIng='.$idIng.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    
                                   
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