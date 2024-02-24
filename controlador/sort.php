<?php
if ($_GET['searchBox'] !== '' && $_GET['sortSelect'] !== '') {
	$text = $_GET['searchBox'];
	$selectOption = $_GET['sortSelect'];
} elseif ($_GET['sortSelect'] !== '') {
	$text = '';
	$selectOption = $_GET['sortSelect'];
} else {
	die;
}

$category = '';
if ($_GET['category']) {
	$category = $_GET['category'];
}

//alida que tipo de opccion selecciono el usuario
if ($selectOption == 1) {
	$selectOption = "ORDER BY date DESC";
} elseif ($selectOption == 2) {
	$selectOption = "ORDER BY title ASC";
} elseif ($selectOption == 3) {
	$selectOption = "ORDER BY description ASC";
} elseif ($selectOption == 4) {
	$selectOption = "ORDER BY date ASC";
}

require_once("../modelo/rssReader_model.php");
$feed = new rssReaderModel();
$items = $feed->search_items_and_sort($text, $selectOption, $category);
unset($feed);

if (!$items) {
	echo "<h1>No hay noticias que mostrar</h1>";
	echo "<h3>No se encontró nada.</h3>";
	die;
} else {
	require_once('../vista/rss_reader.php');
}
