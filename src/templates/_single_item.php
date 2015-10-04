<div class="container">
	<div class="row clearfix">
	    <!-- боковое меню -->
        <?php include_once '_menu.php'; ?>
		<div class="catalog column column9">
			<!-- хлебные крошки -->
			<div class="breadcrumbs item-breadcrumbs">
				<a href="<?= \App\Utilities\Options::URL ?>">Главная</a>
				<a href="<?= \App\Utilities\Options::URL . 'category/?id=' . $category_by_prod['id'] . '">' . $category_by_prod['name'] ?></a>
				<p><?= $product['name'] ?></p>
			</div>

			<div class=" row clearfix item-heading">
				<!-- название товара -->
				<h1 class="item-name column column6">
                    <?= $product['name'] ?>
                </h1>
				<!-- цена -->
				<p class="price column column6"><?= $product['price'] ?> P</p>
			</div>
			<div class="row clearfix">
				<div class="column column6">
					<!-- галерея картинок -->
					<div class="item-gallery">
						<img src="<?= $product['photo'] ?>" alt="уточка">
					</div>
				</div>
				<div class="column column6">
				<!-- описание -->
					<p class="item-description">
                        <?= $product['description']; ?>
					</p>
					<!-- цена -->
					<p class="price"><?= $product['price']?> P</p>
					<div class="order-btns">
						<span rel="/cart/add/?item=<?=$product['id'];?>" class="btn-basket" onclick="return putToBasket($(this));">
							<span class="basket-btn-tx">В Корзину</span><span class="basket-btn-num-wr"> (<span class="basket-btn-num">0</span>)</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>