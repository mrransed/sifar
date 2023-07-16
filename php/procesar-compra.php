<?php

    require("conex.php");

    $query=mysqli_query($con,"INSERT INTO 
    pagosproductos(cliente_id, producto_id, 
    tipoPago, fecha_pago, monto) 
    VALUES(1,1,1,1,1)");
    



?>

<script>alert("funciona php")</script>