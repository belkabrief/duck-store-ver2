<?php
$src_path = __DIR__ . '/../src/';
include_once $src_path . 'autoload.php';
session_start();
$connection = new \App\DB\Connection('root', '');
$urler = new \App\Utilities\Url();
$page = $urler->getPage();
$categories = \App\DB\Categories::getAll($connection);

switch ($page) {
    case 'main':
        include_once $src_path . 'main.php';
        break;
    case 'category':
        include $src_path . 'category.php';
        break;
    case 'product':
        include $src_path . 'single-item.php';
        break;
    case 'cart/add':
        include $src_path . 'cart_add.php';
        break;
	case 'cart/del':
        include $src_path . 'cart_del.php';
        break;
    case 'cart':
        include $src_path . 'cart.php';
        break;
	case 'order':
        include $src_path . 'order.php';
        break;
    case 'login':
        include $src_path . 'login.php';
        break;
	case 'admin':
        include $src_path . 'admin.php';
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}