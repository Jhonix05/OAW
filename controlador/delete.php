<?php
		require_once("../modelo/rssReader_model.php");
		$rssModel = new rssReaderModel();
		$rssModel->delete_items();

		if (isset($_COOKIE['urls'])) {
			setcookie('urls', '', time() - 3600);
		}