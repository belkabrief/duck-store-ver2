<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';

$error_mess = "";

if(empty($_POST) || $_POST['ord_fio']=='' || $_POST['ord_addr']=='' || $_POST['ord_email']==''){
	if (!empty($_POST)) {
		if ($_POST['ord_fio']==''){
			$error_mess .= "Не заполнено поле \"ФИО\"<br/>";
		}
		if ($_POST['ord_addr']==''){
			$error_mess .= "Не заполнено поле \"Адрес\"<br/>";
		}
		if ($_POST['ord_email']==''){
			$error_mess .= "Не заполнено поле \"E-mail\"<br/>";
		}
		
		if (mb_strlen($error_mess) > 1) {
			echo "<p>{$error_mess}</p>";
			unset($error_mess);
		}
	}
	include_once __DIR__ . '/templates/_order_form.php';
	include_once __DIR__ . '/templates/_footer.php';
} else {
    $ord = \App\DB\Orders::setOrder($connection);
    echo "<div class='tx_res'>Ваш заказ успешно оформлен!</div>";
?>
	<script>delCookie('products')</script>;
<?php   
}

include_once __DIR__ . '/templates/_footer.php';