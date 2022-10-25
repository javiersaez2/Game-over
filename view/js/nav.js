//nav
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    loadTipoProducto();
    loadIdiomas()

});

function loadIdiomas() {
    $.ajax({
        type: "GET",
        url: "../../controller/controller_index_idiomas.php",
        dataType: "json",
        success: function(result) {
            var idiomas = result.idiomasList;

            var newRow = '';
            for (let i = 0; i < idiomas.length; i++) {
                newRow += "<a href='#!'>" + idiomas[i].idioma + "</a>"
            }

            document.getElementById("dropdownIdiomas").innerHTML += newRow;

        },
        error: function(xhr) {
            console.log('1', xhr.responseText)
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        },

    });
};


function loadProductosTodos() {
    $.ajax({
        type: "GET",
        url: "../../controller/controller_index_productos.php",
        dataType: "json",
        success: function(result) {
            var Productos = result.productosList;
            console.log(result.productosList)
            var newRow = '';
            for (let i = 0; i < Productos.length; i++) {
                newRow += "<div class='card'><img src='" + Productos[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + Productos[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < Productos[i].valoracion; index++) {
                    newRow += "<i class = 'fa-solid fa-star' > </i>"
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + Productos[i].precio + " €</span>" +
                    "<button>Comprar</button>" +
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





function loadTipoProducto() {
    $.ajax({
        type: "GET",
        url: "../../controller/controller_index_tipoProducto.php",
        dataType: "json",
        success: function(result) {
            var TipoProducto = result.listTipoProductos;

            var newRow = '';
            for (let i = 0; i < TipoProducto.length; i++) {
                newRow += "<a href='#!' onclick='loadProductos(" + TipoProducto[i].id + ")'>" + TipoProducto[i].nombre + "</a>"
                    // onclick="loadProductos( TipoProducto[i].idtipo)"
            }

            document.getElementById("dropdownProductos").innerHTML += newRow;

        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        },

    });
};


function loadProductos(idTipo = null) {
    document.getElementById("card").innerHTML = '';

    $.ajax({
        type: "GET",
        url: "../../controller/controller_productoId.php",
        data: { 'idTipo': idTipo },
        dataType: "json",
        success: function(result) {
            var ProductosId = result.productosListId;
            console.log(result.productosListId)
            var newRow = '';
            for (let i = 0; i < ProductosId.length; i++) {
                newRow += "<div class='card'><img src='" + ProductosId[i].foto + "'>" +
                    "<div class='product' id=''>" +
                    "<span class='product-name' id='product-name'>" + ProductosId[i].titulo + "</span>" +
                    "<div class='product-rating'>"
                for (let index = 0; index < ProductosId[i].valoracion; index++) {
                    newRow += "<i class = 'fa-solid fa-star' > </i>"
                }
                newRow += "</div>" +
                    "</div>" +
                    "<div class='price' id=''>" +
                    "<span class='now-price' id='now-price'>" + ProductosId[i].precio + " €</span>" +
                    "<button>Comprar</button>" +
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