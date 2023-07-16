<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-plan.php" method="post" enctype="multipart/form-data">
                         
                           <input type="text" placeholder="nombre del plan" name="nombre" class="btn-m">
                            <select name="tipoPlan" id="" class="custom-select mb-2">
                                <option value="">Selecione el tipo de plan</option>
                                <option value="mensual">Mensual</option>
                                <option value="15 dias">15 dias</option>
                                <option value="anual">Anual</option>
                            </select>
                            <input type="text" placeholder="descripcion" name="descripcion" class="btn-m">
                            <input type="text" placeholder="precio" name="precio" class="btn-m">
                          
                         
                                                       
                            <button type="submit" class="btn-m">crear</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>