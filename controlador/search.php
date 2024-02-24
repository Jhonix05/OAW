<?php
	// la lógica para buscar los artículos del RSS en la base de datos.
	if (empty($_POST['searchtext'])) {
		die;
	}
	$text = $_POST['searchtext'];


	require_once("../modelo/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items($text);

	if (!$items) {
		echo "<h1>No hay noticias que mostrar</h1>";
		echo "<h3>Parece que no hay nada referente.</h3>";
		die;
	} else {
		require_once('../vista/rss_reader.php');
	}