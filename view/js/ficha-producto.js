var id_producto = "";
function loadFichaProducto(id) {
    id_producto = id;
    swap_block_callback("content","view/html/ficha_producto.html",get_product);
}


function get_product(){
    $.ajax({
        type: "GET",
        url: "controller/controller_ficha_producto.php",
        data: { 'id': id_producto },
        dataType: "json",
        success: function(data) {
            console.log(JSON.stringify(data));
            set_product_data(data.producto);
        }
    });
}

function set_product_data(producto) {
    set_product_imagen(producto['foto']);
    set_product_titulo(producto.titulo);
    set_product_desc(producto.descripcion);
    set_product_valoracion(producto.valoracion);
    set_product_precio(producto.precio);
}

function set_product_imagen(imagen_url) {
    if (imagen_url != null) {
        document.getElementById("imagen-producto").src = "view/Resources/images_productos/" + imagen_url;
    } else {
        document.getElementById("imagen-producto").src = "view/resources/img/placeholder.png";
    }
}

function set_product_titulo(titulo) {
    document.getElementById("titulo-producto").innerHTML = titulo;
}

function set_product_desc(descripcion) {
    document.getElementById("descripcion-producto").innerHTML = descripcion ;
}

function set_product_valoracion(valoracion) {
    estrellas = document.getElementsByClassName("fa-star");
    for (let i = 0; i < valoracion; i++) {
        estrellas[i].style.color = "orange";
    }
}

function set_product_precio(precio) {
    document.getElementById("precio-producto").innerHTML = precio + " €";
}