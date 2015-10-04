<?php
	//вывод таблицы товаров на странице редактирования товаров
	function showTableProducts($connection){
		echo "Товары в таблице Products<br/>";
		$statement = $connection->prepare("SELECT * FROM `products`");
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);  
		echo "<table class='prod_tab'>
		<thead><td>Id</td><td>Title</td><td>Description</td><td>Price</td><td>Photo</td><td>ID cat</td>
		<td colspan='2'><a href='/admin/?to_do=add_item' style='color:#097137'>Добавить товар</a></td></thead>
		<tbody>";
		while ($row = $statement->fetch()) {
			echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td>" . $row['price'] . "</td><td>" . $row['photo'] . "<td>" . $row['id_cat'] . "</td><td><a href='/admin/?to_do=edit_item&item_id=". $row['id'] ."'>Редактировать</a></td><td><a href='/admin/?to_do=edit_item_tb&item_id=" . $row['id'] . "&item_act=del'>Удалить</a></td></tr>";
		}
		echo "</tbody></table>";
	}
	
	//редактирование товара
	function editProduct($t_id, $connection){
		$statement = $connection->prepare("UPDATE `products` SET `name`=:title,`description`=:descr,`price`=:price , `photo`=:photo, `id_cat`=:id_cat WHERE id=:id");
	
		$statement->bindParam(':id', $t_id, PDO::PARAM_INT);
		$statement->bindParam(':title', $_POST['t_title'], PDO::PARAM_STR, 100);
		$statement->bindParam(':descr', $_POST['t_descr'], PDO::PARAM_STR, 100);
		$statement->bindParam(':price', $_POST['t_price'], PDO::PARAM_STR, 10);
		$statement->bindParam(':photo', $_POST['t_photo'], PDO::PARAM_STR, 255);
		$statement->bindParam(':id_cat', $_POST['id_cat'], PDO::PARAM_STR, 10);
		$statement->execute();	
	}
	
	//удаление товара
	function deleteProduct($t_id,$connection){
		$statement = $connection->prepare("DELETE FROM `products` WHERE `id` = :id");
		$statement->bindParam(':id', $t_id, PDO::PARAM_STR, 100);
		$statement->execute();		
	}
	
	//добавление
	function addProduct($connection){
		$statement = $connection->prepare("INSERT INTO `products`(`name`, `description`, `price`,`id_cat`) VALUES (:title,:descr,:price,:id_cat)");
		$statement->bindParam(':title', $_POST['t_title'], PDO::PARAM_STR, 100);
		$statement->bindParam(':descr', $_POST['t_descr'], PDO::PARAM_STR, 100);
		$statement->bindParam(':price', $_POST['t_price'], PDO::PARAM_STR, 10);
		$statement->bindParam(':id_cat', $_POST['t_category'], PDO::PARAM_STR, 10);
		$statement->execute();
	}
	
	//вывод всех разделов каталога
	function showTableCategories($connection){
		echo "Разделы в таблице Categories<br/>";
		$statement = $connection->prepare("SELECT * FROM `categories`");
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);  
		echo "<table class='prod_tab'>
		<thead><td>Id</td><td>Title</td><td>Description</td>
		<td colspan='2'><a href='/admin/?to_do=add_category' style='color:#097137'>Добавить раздел</a></td></thead>
		<tbody>";
		while ($row = $statement->fetch()) {
			echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td><a href='/admin/?to_do=edit_category&item_id=". $row['id'] ."'>Редактировать</a></td><td><a href='/admin/?to_do=edit_cat_tb&item_id=" . $row['id'] . "&item_act=del'>Удалить</a></td></tr>";
		}
		echo "</tbody></table>";
	}
	
	//редактирование раздела
	function editCategory($connection){
		$statement = $connection->prepare("UPDATE `categories` SET `name`=:title,`description`=:descr WHERE id=:id");
		$statement->bindParam(':id', $_POST['id_cat'], PDO::PARAM_INT);
		$statement->bindParam(':title', $_POST['t_title'], PDO::PARAM_STR, 100);
		$statement->bindParam(':descr', $_POST['t_descr'], PDO::PARAM_STR, 100);
		$statement->execute();
	}
	
	//удаление раздела
	function deleteCategory($t_id,$connection){
		$statement = $connection->prepare("DELETE FROM `categories` WHERE `id` = :id");
		$statement->bindParam(':id', $t_id, PDO::PARAM_STR, 100);
		$statement->execute();	
		
		$statement = $connection->prepare("UPDATE `products` SET `id_cat`= 0 WHERE `id_cat` =:t_id");
		$statement->bindParam(':t_id', $t_id, PDO::PARAM_STR, 100);
		$statement->execute();		
	}
	
	//добавление раздела
	function addCategory($connection){
		$statement = $connection->prepare("INSERT INTO `categories`(`name`, `description`) VALUES (:title,:descr)");
		$statement->bindParam(':title', $_POST['t_title'], PDO::PARAM_STR, 100);
		$statement->bindParam(':descr', $_POST['t_descr'], PDO::PARAM_STR, 100);
		$statement->execute();
	}
	
	//вывод всех заказов
	function showTableOrders($connection){
		echo "Заказы в таблице Orders<br/>";
		$statement = $connection->prepare("SELECT * FROM `orders`");
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);  
		echo "<table class='prod_tab'>
		<thead><td>Id</td><td>Номер заказа</td><td>ФИО</td><td>Адрес</td><td>E-mail</td></thead>
		<tbody>";
		while ($row = $statement->fetch()) {
			echo "<tr><td>" . $row['id'] . "</td><td>" . $row['num_order'] . "</td><td>" . $row['fio'] . "</td><td>" . $row['address'] . "</td><td>" . $row['email'] ."</td></tr>
			<tr><td><table>";
			$itogo = 0;
			$stmt = $connection->prepare("SELECT * FROM `order_product` WHERE `num_order` = :num_ord");
			$stmt->execute(['num_ord' => $row['num_order']]);  
			$productsInCart = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach ($productsInCart as $id => $prd) {
				$product = \App\DB\Products::get($prd['id_prod'], $connection);
				echo "<tr><td>". $product['name'] ."</td><td>" . $prd['amount_prod'] . "</td><td>" . $product['price'] ."</td></tr>";
				$itogo += $prd['amount_prod'] * $product['price'];
			}
			echo "<tr><td colspan='2'>Итого</td><td>" . $itogo  . "</td></tr>";
			echo "</table></td></tr>";
		}
		echo "</tbody></table>";
	}