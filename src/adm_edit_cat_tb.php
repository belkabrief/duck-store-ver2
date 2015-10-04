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
					editCategory($connection);
					echo "Категория с id='" . $t_id . "' успешно изменена<br/><br/>";
					break;
				case 'del':
					deleteCategory($t_id, $connection);
					echo "Категория с id='" . $t_id . "' успешно удалена<br/><br/>";
					break;
				case 'add':
					addCategory($connection);
					echo "Категория успешно добавлена<br/><br/>";
					break;
			}
		}
		//вывод таблицы категорий на странице редактирования категорий
		showTableCategories($connection);
	echo "</div>";
	
	include_once __DIR__ . '/templates/_footer.php';