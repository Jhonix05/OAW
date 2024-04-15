<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Lector de noticias RSS - Feeds</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="../css/styles.css" rel="stylesheet" />
	<link href="../css/styles_front_min.css" rel="stylesheet" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

</head>

<body>
	<!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a id="titulo-texto" class="navbar-brand" href="../vista/index.php">Lector de noticias RSS</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
					<li class="nav-item"><a class="nav-link active" aria-current="page" href="feed.php">Añadir Feeds</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Header-->
	<header class="py-5 bg-dark">
		<div class="overlay"></div>
		<div class="container px-5">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-xxl-6">
					<div class="my-5 text-white">
						<h1 class="fw-bolder text-center mb-3">Lector de Noticias RSS</h1>
						<p class="lead text-center fw-normal mb-4">
							Añade feeds para estar siempre informado
						</p>
						<ol class="lead fw-normal mb-4">
							
						</ol>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="py-5 bg-light">
		<div class="container px-5 my-5">
			<div class="text-center">
				<h2 class="fw-bolder">Añadir Feeds</h2>
			</div>
			<!-- Side widget-->
			<div class="card mb-4">
				<div class="card-body">Ingresa la URL del Feed que deseas añadir.
					<div class="input-group align-items-center justify-content-center">
						<form class="col-12" method='POST'>
							<!-- Message input-->
							<div class="form-floating m-3">
								<textarea id="textArea" name="textArea" class="form-control form-control-height" type="text" placeholder="Ingresar Sitio..."></textarea>
								<label for="Ingresar Sitio">Ingresar Sitios</label>
							</div>
							<!-- Submit Button-->
							<div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
								<button class="btn btn-primary" id="button-delete" type="button" onclick="loadFile('../controlador/delete.php');
									show('loading');">Borrar</button>
								<button class="btn btn-primary" id="button-upload" type="button" onclick="loadFile('../controlador/upload.php');
									show('loading');">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer-->
	<footer class="py-5 bg-dark">
		<div class="container"></div>
	</footer>

	<script src="../js/feed_script.js"></script>
</body>

</html>
