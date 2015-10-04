<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $product = \App\DB\Products::get($id, $connection);
    if (!$product) {
        die("Такой утки не обнаружено");
    }
	//получаем текущую категорию по id товара
    $category_by_prod = \App\DB\Categories::get($product['id_cat'], $connection);

    include_once __DIR__ . '/templates/_single_item.php';
    include_once __DIR__ . '/templates/_footer.php';
} else {
    die("Такой утки не обнаружено");
}