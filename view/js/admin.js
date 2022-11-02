function cargarModalAnadir() {
    // escribir solo numeros en stock y precio en el formulario de añadir producto
    document.getElementById("stock").addEventListener("keypress", function(event) {
        if (event.charCode < 48 || event.charCode > 57) {
            event.preventDefault();
        }
    });
    document.getElementById("precio").addEventListener("keypress", function(event) {
        if (event.charCode < 48 || event.charCode > 57) {
            event.preventDefault();
        }
    });
    document.getElementById("myModalAnadir").style.display = "block";
}

function closeModalAnadir() {
    document.getElementById("myModalAnadir").style.display = "none";
}

function cargarProdAdmin() {
    loadTipoProductoSelector();
    document.getElementById("card").innerHTML = '';

    $.ajax({
        type: "GET",
        url: "controller/controller_index_productos.php",
        dataType: "json",
        success: function(result) {
            var Productos = result.productosList;
            var newRow = '';
            for (let i = 0; i < Productos.length; i++) {
                newRow += "<div class='card'><img src='view/Resources/images_productos/" + Productos[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + Productos[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < 5; index++) {
                    if (index < Productos[i].valoracion) {
                        newRow += "<i class = 'fa-solid fa-star amarillo' > </i>"
                    } else {
                        newRow += "<i class = 'fa-solid fa-star' > </i>"
                    }
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + Productos[i].precio + " €</span>" +
                    "<button value='" + Productos[i].id + "' onclick='modificarProduct()'>Modificar</button>" +
                    "<button id='idDelete' value='" + Productos[i].id + "' onclick='deleteProduct()'>Delete</button>" +
                    "</div>" +
                    "</div>"

            };
            document.getElementById("card").innerHTML += newRow;
            //newRow = "</div>";
        },
        error: function(xhr) {
            console.log(xhr.responseText)
            alert("An error occured: " + xhr.status + " " + xhr.responseText);
        },

    });
};



function deleteProduct() {
    var id = event.target.value;
    $.ajax({
        type: "GET",
        data: { 'id': id },
        url: "controller/controller_delete.php",
        dataType: "json",
        success: function(result) {
            if (result.borrarProductoList = true) {
                alert("se ha borrado")
            } else {
                alert("No se puede borrar")
            }
            cargarProdAdmin()
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });

};

function loadTipoProductoSelector() {
    $.ajax({
        type: "GET",
        url: "controller/controller_index_tipoProducto.php",
        dataType: "json",
        success: function(result) {
            var TipoProducto = result.listTipoProductos;
            document.getElementById("TipoProducto").innerHTML = "";
            document.getElementById("modificar-TipoProducto").innerHTML = "";
            document.getElementById("dropdownFilterTipo-menu").innerHTML = "";
            for (let i = 0; i < TipoProducto.length; i++) {
                document.getElementById("TipoProducto").innerHTML += "<option value='" + TipoProducto[i].id + "'>" + TipoProducto[i].nombre + "</option>"
                document.getElementById("modificar-TipoProducto").innerHTML += "<option value='" + TipoProducto[i].id + "'>" + TipoProducto[i].nombre + "</option>"
                document.getElementById("dropdownFilterTipo-menu").innerHTML += "<li value='" + TipoProducto[i].id + "' onclick='filtrarProductos(" + TipoProducto[i].id + ")'>" + TipoProducto[i].nombre + "</li>"
            }
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        },

    });
};


function execInsert() {

    var titulo = document.getElementById("titulo").value;
    var stock = document.getElementById("stock").value;
    var precio = document.getElementById("precio").value;
    var foto = document.getElementById("foto").value;
    var valoracion = document.getElementById("valoracion").value;
    var descripcion = document.getElementById("descripcion").value;
    var TipoProducto = document.getElementById("TipoProducto").value;
    if (titulo == "") {
        alert("Titulo esta vacio")
    } else if (precio == 0) {
        alert("precio esta vacio")
    } else if (stock == 0) {
        alert("stock esta vacio")
    } else if (descripcion == "") {
        alert("descripcion esta vacio")
    } else {
        $.ajax({
            type: "GET",
            data: { 'titulo': titulo, 'stock': stock, 'precio': precio, 'foto': foto, 'valoracion': valoracion, 'descripcion': descripcion, 'TipoProducto': TipoProducto },
            url: "controller/controller_insert.php",
            dataType: "json",
            success: function(result) {

                var inputs = document.querySelectorAll("#insert input")
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].value = "";
                }
                document.querySelector("#insert textarea").value = ""
                document.getElementById("valoracion").value = 0;
                document.getElementById("myModalAnadir").style.display = "none"
                cargarProdAdmin()
            },
            error: function(xhr) {
                console.log(xhr.responseText)
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
};

function filtrarProductos(idTipo = null) {
    document.getElementById("card").innerHTML = '';

    $.ajax({
        type: "GET",
        url: "controller/controller_productoId.php",
        data: { 'idTipo': idTipo },
        dataType: "json",
        success: function(result) {
            var Productos = result.productosListId;
            var newRow = '';
            for (let i = 0; i < Productos.length; i++) {
                newRow += "<div class='card'><img src='view/Resources/images_productos/" + Productos[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + Productos[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < 5; index++) {
                    if (index < Productos[i].valoracion) {
                        newRow += "<i class = 'fa-solid fa-star amarillo' > </i>"
                    } else {
                        newRow += "<i class = 'fa-solid fa-star' > </i>"
                    }
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + Productos[i].precio + " €</span>" +
                    "<button value='" + Productos[i].id + "' onclick='modificarProduct()'>Modificar</button>" +
                    "<button id='idDelete' value='" + Productos[i].id + "' onclick='deleteProduct()'>Delete</button>" +
                    "</div>" +
                    "</div>"

            };
            document.getElementById("card").innerHTML += newRow;
        },
        error: function(xhr) {
            console.log(xhr.responseText)
            alert("An error occured: " + xhr.status + " " + xhr.responseText);
        },

    });
};

var listPrecio = document.querySelectorAll("#valuePrecio")

for (let index = 0; index < listPrecio.length; index++) {
    listPrecio[index].addEventListener("click", filtrarPrecio);
}


function filtrarPrecio(precio) {
    //var precio = event.target.value;
    document.getElementById("card").innerHTML = '';

    $.ajax({
        type: "GET",
        url: "controller/controller_productoPrecio.php",
        data: { 'precio': precio },
        dataType: "json",
        success: function(result) {
            var Productos = result.productosPrecio;
            var newRow = '';
            for (let i = 0; i < Productos.length; i++) {
                newRow += "<div class='card'><img src='view/Resources/images_productos/" + Productos[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + Productos[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < 5; index++) {
                    if (index < Productos[i].valoracion) {
                        newRow += "<i class = 'fa-solid fa-star amarillo' > </i>"
                    } else {
                        newRow += "<i class = 'fa-solid fa-star' > </i>"
                    }
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + Productos[i].precio + " €</span>" +
                    "<button value='" + Productos[i].id + "' onclick='modificarProduct()'>Modificar</button>" +
                    "<button id='idDelete' value='" + Productos[i].id + "' onclick='deleteProduct()'>Delete</button>" +
                    "</div>" +
                    "</div>"

            };
            document.getElementById("card").innerHTML += newRow;

        },
        error: function(xhr) {
            console.log(xhr.responseText)
            alert("An error occured: " + xhr.status + " " + xhr.responseText);
        },

    });

}

function buscarNombre() {
    var nombre = document.getElementById("textBuscador").value;
    document.getElementById("textBuscador").value = '';
    document.getElementById("card").innerHTML = '';

    $.ajax({
        type: "GET",
        url: "controller/controller_productosNombre.php",
        data: { 'nombre': nombre },
        dataType: "json",
        success: function(result) {
            var Productos = result.productosNombre;
            console.log(result.productos)
            var newRow = '';
            for (let i = 0; i < Productos.length; i++) {
                newRow += "<div class='card'><img src='view/Resources/images_productos/" + Productos[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + Productos[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < 5; index++) {
                    if (index < Productos[i].valoracion) {
                        newRow += "<i class = 'fa-solid fa-star amarillo' > </i>"
                    } else {
                        newRow += "<i class = 'fa-solid fa-star' > </i>"
                    }
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + Productos[i].precio + " €</span>" +
                    "<button value='" + Productos[i].id + "' onclick='modificarProduct()'>Modificar</button>" +
                    "<button id='idDelete' value='" + Productos[i].id + "' onclick='deleteProduct()'>Delete</button>" +
                    "</div>" +
                    "</div>"

            };
            document.getElementById("card").innerHTML += newRow;

        },
        error: function(xhr) {
            console.log(xhr.responseText)
            alert("An error occured: " + xhr.status + " " + xhr.responseText);
        },

    });
}


function modificarProduct() {
    cargarModal("myModalModificar");

    var id = event.target.value;
    cargarProductoModificar(id);
}

function cargarProductoModificar(id) {
    console.log(id);
    // escribir solo numeros en stock y precio en el formulario de modificar producto
    document.getElementById("modificar-precio").addEventListener("keypress", function(event) {
        if (event.charCode < 48 || event.charCode > 57) {
            event.preventDefault();
        }
    });
    document.getElementById("modificar-stock").addEventListener("keypress", function(event) {
        if (event.charCode < 48 || event.charCode > 57) {
            event.preventDefault();
        }
    });


    $.ajax({
        type: "GET",
        data: { 'id': id },
        url: "controller/controller_show_update.php",
        dataType: "json",
        success: function(result) {
            //MostrarDatosProductoModificar(result.producto);
            var producto = result.producto;
            document.getElementById("modificar-titulo").value = producto.titulo;
            document.getElementById("modificar-stock").value = producto.stock;
            document.getElementById("modificar-precio").value = producto.precio;
            document.getElementById("modificar-valoracion").value = producto.valoracion;
            document.getElementById("modificar-descripcion").value = producto.descripcion;
            document.getElementById("modificar-foto").value = producto.foto;
            document.getElementById("modificar-id").value = producto.id;
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}

function guardarModificar() {

    var id = document.getElementById('modificar-id').value;
    var titulo = document.getElementById('modificar-titulo').value;
    var stock = document.getElementById('modificar-stock').value;
    var precio = document.getElementById('modificar-precio').value;
    var valoracion = document.getElementById('modificar-valoracion').value;
    var descripcion = document.getElementById('modificar-descripcion').value;
    var tipo = document.getElementById('modificar-TipoProducto').value;
    var foto = document.getElementById('modificar-foto').value;
    if (titulo == "") {
        alert("Titulo esta vacio")
    } else if (precio == 0) {
        alert("precio esta vacio")
    } else if (stock == 0) {
        alert("stock esta vacio")
    } else if (descripcion == "") {
        alert("descripcion esta vacio")
    } else {
        $.ajax({
            type: "GET",
            data: { 'id': id, 'titulo': titulo, "stock": stock, "precio": precio, "valoracion": valoracion, "descripcion": descripcion, "tipo": tipo, "foto": foto },
            url: "controller/controller_update.php",
            //dataType: "json",
            success: function(result) {
                if (result) {
                    alert("Guardado correctamente");
                } else {
                    alert("se a producido un error");
                }
                loadAdmin();

            },
            error: function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
}