<aside class="column column3">
	<h2>Каталог</h2>
	<ul>
		<?php foreach($categories as $_category){
			$act_c = '';
			if((isset($_GET['id']) && isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] == '/category/'&& $_GET['id']==$_category['id']) 
				||(isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] == '/product/' && $category_by_prod['id']==$_category['id'])){
				$act_c = "class='active_left_menu'";
			} 
			echo "<li><a href='"
				."/category/?id="
				.$_category['id']."'" . $act_c . ">"
				.$_category['name']."</a></li>";
		}
		
		?>
	</ul>
</aside>