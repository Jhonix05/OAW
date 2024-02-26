<?php

	require_once("../modelo/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->get_items();
	unset($feed);

	if (!$items) {
		echo "<p class='msg-title-noticias'>No hay noticias por mostrar</p>";
		echo "<p class='msg-body-noticias'>¡Añade Feeds en la pestaña correspondiente!</p>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../vista/rss_reader.php');
	}
