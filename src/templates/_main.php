<main>
	<div class="container">
		<div class="banner"></div>
		<div class="row clearfix">
			<!-- боковое меню -->
            <?php include_once '_menu.php'; ?>
			<div class="column column9">
				<div class="catalog">
					<div class="row clearfix">
					<!-- элементы каталога -->
					<?php
						foreach ($products as $product) {
		                    include '_shop_element.php';
						}
					 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>