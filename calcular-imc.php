
<?php
$peso = $altura = $imc = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    // Verificar que los campos no estén vacíos
    if (!empty($peso) && !empty($altura)) {
        // Calcular el IMC
        $alturaMetros = $altura / 100; // Convertir la altura de cm a m
        $imc = $peso / ($alturaMetros * $alturaMetros);
        $imc = round($imc, 2); // Redondear el IMC a 2 decimales
    }
}
?>


<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="index.php?pag=calcular-imc" method="post" enctype="multipart/form-data">
                         
                            <input type="number" placeholder="peso" name="peso" class="btn-m" >
                            <input type="number" placeholder="altura" name="altura" class="btn-m">

                            <button type="submit" class="btn-m">calcular</button>



                            <br>
                            <label for="">


                            <?php if (!empty($imc)): ?>
                            <h2 class="text-light text-center">El IMC es de: <?php echo $imc; ?></h2>
                            <?php endif; ?>

                            </label>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>