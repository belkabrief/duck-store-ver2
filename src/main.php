<?php
	$products = \App\DB\Products::getToMainPage($connection);
	
	include_once __DIR__ . '/templates/_header.php';
	include_once __DIR__ . '/templates/_top_menu.php';
	include_once __DIR__ . '/templates/_main.php';
	include_once __DIR__ . '/templates/_footer.php';