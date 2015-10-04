<?php
namespace App\DB;
use App\DB\Connection;
class Orders
{
    public static function getAll(Connection $connection)
    {
        $ord_stmt = $connection->prepare("SELECT * FROM `orders`");
        $ord_stmt->execute();
        return $ord_stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function setOrder(Connection $connection)
    {
		$ord_comment = '';
		if (isset($_POST['ord_comment'])){
			$ord_comment = $_POST['ord_comment'];
		}
		$num_order = uniqid();
		
        $statment = $connection
            ->prepare("INSERT INTO `orders`(`num_order`,`fio`, `address`, `email`, `ord_comment`, `created_at`) VALUES (:num_order,:fio, :address, :email, :ord_comment, now())");
        $statment->execute([
			'num_order' => $num_order, 
			'fio' => $_POST['ord_fio'],
			'address'=> $_POST['ord_addr'],
			'email' => $_POST['ord_email'],
			'ord_comment' => $ord_comment]); 
			
		//сохранение товаров, входящих в заказ
		$productsInCart = $_COOKIE['products'];
		foreach ($productsInCart as $id => $value) {
			$statment = $connection
            ->prepare("INSERT INTO `order_product`(`num_order`,`id_prod`, `amount_prod`) VALUES (:num_order,:id_prod, :amount_prod)");
			$statment->execute([
				'num_order' => $num_order, 
				'id_prod' => $id,
				'amount_prod' => $value]);
		}
		
		//после сохранения заказа очищаем куки
		setcookie("products","",time() - 3600); 
		
    }
}