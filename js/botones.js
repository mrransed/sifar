function mostrarCampo() {
    var tipoPago = document.getElementsByName("tipoPago")[0].value;
    var campoValor = document.getElementById("campoValor");

    if (tipoPago === "efectivo") {
        campoValor.style.display = "block";
    } else {
        campoValor.style.display = "none";
    }
}

function mostrarPrecio() {

        var select = document.getElementsByName("productos")[0];
        var precioLabel = document.getElementById("precioLabel");
        var productoId = select.value;

        // Realizar la solicitud AJAX para obtener el precio del producto
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var precio = this.responseText;
                precioLabel.innerText = "Precio producto: " + precio;
            }
        };
        xhttp.open("GET", "obtener_precio.php?id=" + productoId, true);
        xhttp.send();
    
}