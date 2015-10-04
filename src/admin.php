<?php
	include_once __DIR__ . '/templates/_header.php';
	include_once __DIR__ . '/templates/_top_menu.php';
	
	if (isset($_SESSION['user_id'])){
		if (isset($_GET['to_do'])){  
			switch ($_GET['to_do']){
				case 'edit_item_tb': //таблица товаров
					include_once $src_path . "adm_edit_item_tb.php";
					break;
				case 'edit_cat_tb': //таблица разделов
					include_once $src_path . "adm_edit_cat_tb.php";
					break;
				case 'edit_order_tb': //таблица заказов
					include_once $src_path . "adm_edit_order_tb.php";
					break;
				case 'add_item':
					include_once $src_path . "adm_add_item.php";
					break;
				case 'edit_item':
					include_once $src_path . "adm_edit_item.php";
					break;
				case 'del_item':
					include_once $src_path . "adm_delete_item.php";
					break;
				case 'add_category':
					include_once $src_path . "adm_add_category.php";
					break;
				case 'edit_category':
					include_once $src_path . "adm_edit_category.php";
					break;
				default: 
					echo "<h1>Ooops, 404</h1>";
					break;
			}
		} else {
			include_once __DIR__ . '/templates/_admin.php';
		}
	} else {
		echo "<div class='wr_cont'>Чтобы зайти в админку, авторизуйтесь</div>";
	}
	
	include_once __DIR__ . '/templates/_footer.php';