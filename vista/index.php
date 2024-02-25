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
	
</head>

<body>
	<!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<main class="container my-5 bg-dark">
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
			</article>
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
			</aside>
		</section>
	</div>

	
	<!-- Footer-->
	<footer class="py-5 bg-light text-dark">
		<main class="container my-5">
			
		</div>
	</footer>	

		<script src="../js/index_script.js"></script>
</body>

</html>
