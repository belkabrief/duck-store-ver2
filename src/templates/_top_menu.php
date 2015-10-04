<?php
	//получаем общее кол-во товаров в корзине для вывода в верхнем меню
	$valBascket = \App\Utilities\Cookie::getBascketAmount();
?>
<header>
	<div class="container clearfix">
		<!-- логотип -->
		<a href="<?= \App\Utilities\Options::URL ?>" class="logo">Yellow Duck</a>
		<!-- меню -->
		<nav>
			<ul>
				<li><a href="">О Компании</a></li>
				<li><a href="#">Каталог</a></li>
				<li><a href="">Доставка и оплата</a></li>
				<li><a href="">Контакты</a></li>
			</ul>
		</nav>
		<div class="wr_login_block">
			<?php if (isset($_SESSION['user_id'])): ?>
				вы зашли как пользователь
			<?php else: ?>
				<a href="<?= \App\Utilities\Options::URL .'login' ?>">войти</a>
			<?php endif; ?>
		</div>
		<div class="wr_basket_block">
			<a href="<?= \App\Utilities\Options::URL .'cart' ?>">Корзина (<span id="basket_head_num"><?= $valBascket?></span>)</a>
		</div>
	</div>
</header>