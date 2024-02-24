<?php

	require_once("../modelo/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->get_items();
	unset($feed);

	if (!$items) {
		echo "<h1>No hay noticias que mostrar</h1>";
		echo "<h3>¡Añade Feeds en la pestaña correspondiente!</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../vista/rss_reader.php');
	}
