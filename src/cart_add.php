<?php
if (isset($_GET['item']) && is_numeric($_GET['item'])) {
    $item = $_GET['item'];
    $product = \App\DB\Products::get($item, $connection);
    if ($product) {
        if (isset($_COOKIE['products'][$product['id']])) {
            $value = $_COOKIE['products'][$product['id']] + 1;
        } else {
            $value = 1;
        }
        setcookie("products[{$product['id']}]", $value, time() + 3*24*60*60, "/");
    }
	//получаем общее кол-во товаров в корзине для вывода в верхнем меню (+1, т.к. setcookie срабатывает только при перезагрузке страницы)
	$amount = \App\Utilities\Cookie::getBascketAmount() + 1;
	echo $amount;
}
