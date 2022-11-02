function NewValoracionRow(valoracion) {
    var newrow = "";
    for (let index = 0; index < 5; index++) {
        if (index < valoracion) {
            newrow +=  "<i class = 'fa-solid fa-star amarillo' > </i>"
        } else {
            newrow +=  "<i class = 'fa-solid fa-star' > </i>"
        }
    }
    return newrow;
}


function cargarModal(modal_id) {
    var modal = document.getElementById(modal_id);
    openModal(modal);
}

function cerrarModal(modal_id) {
    var modal = document.getElementById(modal_id);
    closeModal(modal);
}

function openModal(modal) {
    modal.style.display = "block";
}

function closeModal(modal) {
    modal.style.display = "none";
}