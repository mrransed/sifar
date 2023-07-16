<section class="contact-section spad" id="setLogin">
        <div class="container">
            <div class="row" id="login">
                
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="php/procesar-history-real.php" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="nombre" name="nombre" class="btn-m">
                            <input type="text" placeholder="apellidos" name="apellidos" class="btn-m">
                            <input type="file" placeholder="imagen" name="imagen" class="btn-m">
                            <input type="text" placeholder="edad" name="edad" class="btn-m">
                            <input type="text" placeholder="peso" name="peso" class="btn-m">
                            <input type="text" placeholder="altura" name="altura" class="btn-m">
                            <input type="text" placeholder="ocupacion" name="ocupacion" class="btn-m">
                            <input type="text" placeholder="descripcion" name="descripcion" class="btn-m">
                            <label for="genero" style="color:white">genero</label>
                            <select name="genero" class="btn-m" id="genero">
                                <option value="F">MUJER</option> 
                                <option value="M">HOMBRE</option> 
                            </select>
                            
                            <button type="submit" class="btn-m">ENTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
           
    </section>