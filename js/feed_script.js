
function show(id) {
    var element = document.getElementById(id);
    if (element) {
        element.style.display = 'block';
    } else {
        console.error('No se encontró ningún elemento con el ID:', id);
    }
}

function hide(id) {
    var element = document.getElementById(id);
    if (element) {
        element.style.display = 'none';
    } else {
        console.error('No se encontró ningún elemento con el ID:', id);
    }
}

function successload(id) {
    setTimeout(function() { hide(id); }, 5000);
    setTimeout(function() { show('success'); }, 5000);
    setTimeout(function() { hide('success'); }, 7000);
}
function failload(id) {
    setTimeout(function() { hide(id); }, 5000);
    setTimeout(function() { show('danger'); }, 5000);
    setTimeout(function() { hide('danger'); }, 7000);

}
function loadFile (url) {
    // Se instancia un objeto del tipo XMLHttpRequest:
    const xmlhttp = new XMLHttpRequest();

    // Parámetros de la petición:
    const method = "POST";
    const async = true;

    // Se inicializa la petición al servidor:
    xmlhttp.open(method, url, async);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Se ejecuta cuando la propiedad readyState se modifica:
    xmlhttp.onreadystatechange = function () {
        if (
            xmlhttp.readyState === XMLHttpRequest.DONE &&
            xmlhttp.status === 200
        ) {
            // Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
            successload("loading");
        }
    };

    // Se ejecuta cuando se recibe la petición hecha al servidor:
    xmlhttp.onload = function () {
        if (xmlhttp.status >= 400) {
            console.error(
                `Error ${xmlhttp.status}`
            );
            document.getElementById(
                "container"
            ).innerHTML = `<h1 align="center">ERROR ${xmlhttp.status}</h1>`;
            failload("loading");
        }
    };

    // Se envía la petición al servidor:
    xmlhttp.send(`feedurl=${document.getElementById('textArea').value}`);
};
