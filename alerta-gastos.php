<?php
require("php/conexion.php");

// Obtener gastos por vencerse (3 días antes hasta la fecha de pago)
$fechaVencimiento = date('Y-m-d', strtotime('+3 days'));
$sql = "SELECT * FROM gastos WHERE pago='NO' OR  pago='' ";
$query = mysqli_query($con, $sql);


?>

<section class="class-timetable-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <span>sysGym</span>
                    <h2>Consulta de gastos por vencerse</h2>
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
                <a href="index.php?pag=crear-gasto" class="primary-btn">Insertar</a>

                <div class="class-timetable">
                    <form action="php/procesar-pago-gastos.php" method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Valor</th>
                                    <th>Fecha de Registro</th>
                                    <th>Fecha de Pago</th>
                                    <th>Categoría</th>
                                    <th>Proveedor</th>
                                    <th>Comentario</th>
                                    <th>Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($res = mysqli_fetch_array($query)) {
                                    $id = $res['id'];
                                    echo '<tr>';

                                    echo '<td class="class-time">';
                                    echo $res['descripcion'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['valor'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['fecha_registro'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['fecha_pago'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['categoria'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['proveedor'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo $res['comentario'];
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo '<input type="checkbox" name="confirmar_pago[' . $id . ']">';
                                    echo '</td>';

                                    echo '<td class="class-time">';
                                    echo '<a href="php/eliminar-gasto.php?id=' . $id . '">' . '<img src="./img/icons/eliminar.png" alt="">' . '</a>';
                                    // echo '<a href="index.php?pag=editar-gasto&id='.$id.'">'.'<img src="./img/icons/editar.png" alt="">'.'</a>';
                                    echo '</td>';

                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <button type="submit" class="primary-btn">Confirmar Pago</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
