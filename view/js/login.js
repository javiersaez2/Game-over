
function loginClick() {
    var username = document.getElementById("user").value
    var password = document.getElementById("pass").value
    $.ajax({
        type: "GET",
        data: { 'username': username, 'password': password },
        url: "controller/controller_index_login.php",
        dataType: "json",
        success: function(result) {
            if (result.loginList == true) {
                location.reload();
            } else {
                alert("incorrecta")
            }
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}

function RegistrarClick() {
    var username = document.getElementById("user-registrar").value
    var password = document.getElementById("pass-registrar").value
    var passwordRepite = document.getElementById("pass-registrar-repite").value

    if (username == "") {
        alert("username esta vacio")
    }
    else if (password == "" || passwordRepite == "") {
        alert("clave esta vacio");
    } 
    else if(password  != passwordRepite){
        alert("los claves no son  iguales");
    }  
    else{
        $.ajax({
            type: "GET",
            data: { 'username': username, 'password': password},
            url: "controller/controller_registrar.php",
            dataType: "json",
            success: function(result) {

                console.log(result.listeUsuarios);
                if (result.listeUsuarios == false) {
                    alert("el usuario ya existe, cambia el nombre");
                    document.getElementById("user-registrar").value =""
                    document.getElementById("pass-registrar").value =""
                    document.getElementById("pass-registrar-repite").value =""
                    cargarModalRegistrar();
                }
                else{
                    alert("el usuario ha registrado")
                    document.getElementById("myModalRegistrar").style.display="none"
                    cargarModal();
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText)
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
}}

function cerrarSesion() {
    $.ajax({
        type: "GET",
        data: {},
        url: "controller/controller_logout.php",
        dataType: "json",
        success: function(result) {
            if (result == true) {
                location.reload();
            } else {
                alert("se a producido un error al cerrar sesion")
            }
        },
        error: function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}

