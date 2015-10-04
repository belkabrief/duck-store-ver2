<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id = $_GET['id'];
} else {
	die('Нет такой категории');
}

$category = \App\DB\Categories::get($id, $connection);
if (!$category) {
	die('Нет такой категории');
}
$products = \App\DB\Products::getByCategory($category['id'], $connection);

include_once __DIR__ . '/templates/_category.php';
include_once __DIR__ . '/templates/_footer.php';