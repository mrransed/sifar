<section class="contact-section spad" id="setLogin">
    <div class="container">
        <div class="row" id="login">
            <div class="col-lg-6">
                <div class="leave-comment">
                    <form action="php/procesar-gasto.php" method="post" enctype="multipart/form-data">

                        <input type="text" placeholder="Descripción" name="descripcion" required>
                        <input type="number" placeholder="Valor" name="valor" required>
                        <input type="date" placeholder="Fecha de Pago" name="fecha_pago">
                        
                        <select name="categoria" class="custom-select mb-2">
                        <option value="">Seleccione una categoría</option>
                        <option value="Alimentación">Alimentación</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Entretenimiento">Entretenimiento</option>
                        <option value="gastos mensuales">gastos mensuales</option>
                        <option value="gastos mensuales">gastos mensuales</option>
                        <option value="facturas">facturas</option>

                        <!-- Agrega más opciones de categorías según tus necesidades -->
                        </select>
                      
                        <input type="text" placeholder="Proveedor" name="proveedor">
                        <textarea placeholder="Comentario" name="comentario"></textarea>
                        <button type="submit" class="btn-m">Crear Gasto</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
