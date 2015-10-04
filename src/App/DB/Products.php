<?php

namespace App\DB;

class Products
{
	//получение всех товаров
    public static function getAll(Connection $connection)
    {
        $statement = $connection->prepare('SELECT * FROM `products`');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

	//получение товара по заданному id
    public static function get($id, Connection $connection)
    {
        $statement = $connection->prepare('SELECT * FROM `products` WHERE id = :id');
        $statement->execute(['id' => $id]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

	//получение товаров по заданной категории
    public static function getByCategory($categoryId, Connection $connection)
    {
        $statement = $connection
            ->prepare('SELECT * FROM `products` WHERE `products`.`id_cat` = :id');
        $statement->execute(['id' => $categoryId]);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
	
	//вывод товаров на главной странице
	public static function getToMainPage(Connection $connection)
    {
        $statement = $connection
            ->prepare('SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 6');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}
