<?php
if (!isset($_COOKIE['urls'])) {
    die;
}


function almacenarNoticias($urls) {
    require_once("storage.php");
    
    // Procesa cada URL
    foreach ($urls as $url) {
        rss_storage(trim($url));
    }
}

// Verifica si se ha solicitado la actualización de noticias
if (isset($_GET['actualizar']) && $_GET['actualizar'] == 'true') {
    $urls = $_COOKIE['urls']; // Se guardan las URL.
    $urls = str_replace('|', PHP_EOL, $urls);
    $urls = explode(PHP_EOL, $urls);
    
    almacenarNoticias($urls); // Almacenar las noticias
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

require_once("../modelo/rssReader_model.php");
$feed = new rssReaderModel();
$items = $feed->get_items();
unset($feed);

if (!$items) {
    echo "<h1>No hay noticias que mostrar</h1>";
    echo "<h3>Añade nuevos feeds desde la pestaña correspondiente</h3>";
    die;
} else {
    // Si no hay un error se llama a la vista:
    require_once('../vista/rss_reader.php');
}
?>
