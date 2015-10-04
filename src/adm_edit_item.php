<?php	
	include_once __DIR__ . '/templates/_header.php';
	include_once __DIR__ . '/templates/_top_menu.php';
	
	echo "<div class='wr_cont'>";
		//вывод полей формы для товара
		include_once __DIR__ . '/templates/_adm_item_form.php';
	echo "</div>";
	
	include_once __DIR__ . '/templates/_footer.php';
	
?>
