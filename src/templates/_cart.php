<div class="container">
	<div class="row clearfix">
		<!-- боковое меню -->
		<?php include_once '_menu.php'; ?>
		<div class="column column9">
			<?php 
			if (isset($_COOKIE['products'])){
				$productsInCart = $_COOKIE['products'];
				echo "<table class='prod_tab'>
					<thead>
						<td>Название товара</td>
						<td>Количество</td>
						<td>Цена за 1 шт.</td>
						<td>Стоимость</td>
						<td></td>
					</thead>
					<tbody>";
				
				$itog_sum = 0;
				foreach ($productsInCart as $id => $value) {
					$product = \App\DB\Products::get($id, $connection);
					$totalPrice = $product['price'] * $value;
					$itog_sum += $totalPrice;
					echo "<tr>";
					echo "<td>{$product['name']}</td>";
					echo "<td>{$value}</td>";
					echo "<td>{$product['price']}</td>";
					echo "<td>{$totalPrice}</td>";
					echo "<td><a href='/cart/del/?item=" . $product['id'] . "' class='btn_del_basket'  onclick='delFromBasket(". $product['id'] .")'>удалить</a></td>";
					echo "</tr>";
				}
				echo "<tr><td colspan='3'><b>Итого</b></td><td>" . $itog_sum . "</td></tr></tbody></table>";
				echo "<a class='order_btn' href='/order'>Оформить заказ</a>";
			} else {
				echo "<p>Ваша корзина пуста.<p>";
			}
			?>
		</div>
	</div>
</div>
