<?php
	if ($_GET['category'] !== '') {
	// obtiene el parámetro de la categoría:
	$parameter = $_GET['category'];
} else {
	die;
}


	require_once("../modelo/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items_by_category($parameter);
	unset($feed);

	if (!$items) {
		echo "<h1>No tenemos noticias que mostrarte</h1>";
		echo "<h3>Parece se puede encontrar lo que quieres.</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../vista/rss_reader.php');
	}