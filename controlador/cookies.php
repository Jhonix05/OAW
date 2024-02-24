<?php
	$value = implode('|', $urls);
	$expire = strtotime('+30 days'); // dura 1 mes.
	setcookie('urls', $value, $expire, '/');