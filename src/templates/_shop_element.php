<div class="item-block column column4">
	<a href="/product/?id=<?=$product['id'];?>" class="item" title="<?=$product['name'];?>">
		<img src="<?=$product['photo'];?>" alt="<?=$product['name'];?>">
	</a>
	<div class="item-cart-name"><?=$product['name'];?></div>
	<span rel="/cart/add/?item=<?=$product['id'];?>" class="btn-basket" onclick="return putToBasket($(this));">
		<span class="basket-btn-tx">В Корзину</span><span class="basket-btn-num-wr"> (+<span class="basket-btn-num">0</span>)</span>
	</span>
</div>