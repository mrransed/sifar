<?php

    require("php/conexion.php");
    $query=mysqli_query($con,"SELECT * FROM empresa")or die("error".mysqli_error($con));
    $res=mysqli_fetch_array($query);
    $empresa=$res['nombre'];
    


?>