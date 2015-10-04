<section>
<div class="container">
	<div class="row clearfix">
	    <!-- боковое меню -->
        <?php include_once '_menu.php'; ?>
		<div class="column column9">
			<div class="catalog">
				<!-- хлебные крошки -->
				<div class="breadcrumbs item-breadcrumbs">
					<a href="<?= \App\Utilities\Options::URL ?>">Главная</a>
					<p><?= $category['name'] ?></p>
				</div>
				<div class="row clearfix">
					<!-- элементы каталога -->
				<?php
					if (!empty($products)) {
	                    foreach($products as $product) {
	                        include '_shop_element.php';
	                    }
					} else {
						echo "<h2>В данной категории нет товаров</h2>";
					}
                ?>
				</div>
				<!-- пагинация -->
				<?php //include_once '_pagination.php'?>
			</div>
		</div>
	</div>
</div>
</section>