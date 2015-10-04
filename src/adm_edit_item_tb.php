<?php
	include_once __DIR__ . '/templates/_libAdmin.php';
	include_once __DIR__ . '/templates/_header.php';
	include_once __DIR__ . '/templates/_top_menu.php';
	
	echo "<div class='wr_cont'>";
		if (isset($_GET['item_act'])){
			if (isset($_GET['item_id'])){
				$t_id = $_GET['item_id'];
			}
			switch ($_GET['item_act']){
				case 'edit':
					editProduct($t_id, $connection);
					echo "Товар с id='" . $t_id . "' успешно изменён<br/><br/>";
					break;
				case 'del':
					deleteProduct($t_id, $connection);
					echo "Товар с id='" . $t_id . "' успешно удалён<br/><br/>";
					break;
				case 'add':
					addProduct($connection);
					echo "Товар успешно добавлен<br/><br/>";
					break;
			}
		}
		//вывод таблицы товаров на странице редактирования товаров
		showTableProducts($connection);
	echo "</div>";
	
	include_once __DIR__ . '/templates/_footer.php';