<?php
	include_once __DIR__ . '/templates/_libAdmin.php';
	include_once __DIR__ . '/templates/_header.php';
	include_once __DIR__ . '/templates/_top_menu.php';
	
	echo "<div class='wr_cont'>";
	
	//вывод таблицы заказов
	showTableOrders($connection);
	echo "</div>";
	
	include_once __DIR__ . '/templates/_footer.php';