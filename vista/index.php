<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Lector de noticias RSS - Inicio</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="../css/styles.css" rel="stylesheet" />
	<link href="../css/styles_front.css" rel="stylesheet" />
	<script type="text/javascript">
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
	</script>
</head>

<body>
	<!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<main class="container my-5">
			<a class="navbar-brand" href="index.php" onclick="window.query='';">Lector de noticias RSS</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
					<li class="nav-item"><a class="nav-link" href="feed.php">Añadir Feeds</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Header-->
	<header class="bg-dark py-5">
		<div class="container px-5">
			<div class="row gx-5 align-items-center justify-content-center">
				<div class="col-lg-8 col-xl-7 col-xxl-6">
					<div class="my-5 text-center text-xl-start">
						<h1 class="display-5 fw-bolder text-white mb-2">
							Lector de Noticias RSS
						</h1>
						<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
							
							<a class="btn btn-outline-light btn-lg px-4" aria-label="Actualizar"
								onclick="loadPhp('../controlador/update.php'); resetQuery();">Actualizar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Page content-->
	<div class="container my-5">
		<section class="row">
			<!-- Blog entries-->
			<article class="col-lg-8 mb-5">
				<!-- Nested row for non-featured blog posts-->
				<div id="container" class="container row"></div>
			</div>
			<!-- Side widgets-->
			<aside class="col-lg-4 mb-5">
				<!-- Search widget-->
				<div class="card mb-4">
					<div class="card-header">Buscar</div>
					<div class="card-body">
						<div class="input-group">
							<input id="searchBox" class="form-control" type="text" placeholder="Busca noticias y más..."
								aria-label="Busca noticias y más..." aria-describedby="button-search"
								onKeyUp="if (event.keyCode === 13) { saveQuery(document.getElementById('searchBox').value);
								loadPhp('../controlador/search.php'); }" />
							<button class="btn btn-primary" id="button-search" type="button" aria-label="Botón buscar"
								onclick="if (document.getElementById('searchBox').value !== '') {
									saveQuery(document.getElementById('searchBox').value);
									loadPhp('../controlador/search.php');
								}">Buscar</button>
						</div>
					</div>
				</div>
				<!-- Categories widget-->
				<div class="card mb-4">
					<div class="card-header">Ordenar Por:</div>
					<div class="card-body">
						<select id="sortSelect" class="form-select" onchange="sortBy()"
							aria-label="Selector de tipos de ordenamiento">
							<option value="1">Más reciente</option>
							<option value="2">Título</option>
							<option value="3">Descripción</option>
							<option value="4">Menos reciente</option>
						</select>
						<h6 class="m-3">Categorías:</h6>
						<div class="row" id="link-categories"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer-->
	<footer class="py-5 bg-light text-dark">
		<main class="container my-5">
			
		</div>
	</footer>	
</body>
<script>
	loadPhp('../controlador/reader.php');
	getCategories();
</script>
</html>
