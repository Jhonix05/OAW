
let query = "";
let category = "";
function loadPhp (url) {
    // Se reinicia la categoría:
    window.category = "";
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
            document.getElementById("container").innerHTML = xmlhttp.responseText;
            if (url === "../controlador/update.php") {
                getCategories();
            }
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
        }
    };

    // Se envía la petición al servidor:
    xmlhttp.send(`searchtext=${document.getElementById('searchBox').value}`);
};

function saveQuery(query) {
    window.query = query;
    window.category = "";
};

function resetQuery () {
    window.query = "";
}

function sortBy() {
    if(!window.query){
        window.query = "";
    }
    if (!window.category) {
        window.category = "";
    }
    let inputTextSearch = window.query;
    let selectedItem = document.getElementById("sortSelect").value;
    let selectedCategory = window.category;
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (
            xmlhttp.readyState === XMLHttpRequest.DONE &&
            xmlhttp.status === 200
        ) {
            // Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
            document.getElementById("container").innerHTML = xmlhttp.responseText;
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
        }
    };
    xmlhttp.open("GET", "../controlador/sort.php?searchBox=" + inputTextSearch
    + "&sortSelect=" + selectedItem + "&category=" + selectedCategory, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function searchCategory(categoryString) {
window.query = "";
const xmlhttp = new XMLHttpRequest();
window.category = categoryString;
xmlhttp.onreadystatechange = function () {
    if (
        xmlhttp.readyState === XMLHttpRequest.DONE &&
        xmlhttp.status === 200
    ) {
        // Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
        document.getElementById("container").innerHTML = xmlhttp.responseText;
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
    }
};
xmlhttp.open("GET", "../controlador/search_category.php?category=" + categoryString, true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send();
}

function getCategories() {
let inputTextSearch = document.getElementById("searchBox").value;
let selectedItem = document.getElementById("sortSelect").value;
const xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function () {
    if (
        xmlhttp.readyState === XMLHttpRequest.DONE &&
        xmlhttp.status === 200
    ) {
        // Se valida que se haya obtenido una respuesta y el código HTTP sea 200 'OK':
        document.getElementById("link-categories").innerHTML = xmlhttp.responseText;
    }
};

// Se ejecuta cuando se recibe la petición hecha al servidor:
xmlhttp.onload = function () {
    if (xmlhttp.status >= 400) {
        console.error(
            `Error ${xmlhttp.status}`
        );
        document.getElementById(
            "link-categories"
        ).innerHTML = `<h1 align="center">ERROR ${xmlhttp.status}</h1>`;
    }
};

xmlhttp.open("GET", "../controlador/get_categories.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send();
}


loadPhp('../controlador/reader.php');
getCategories();
