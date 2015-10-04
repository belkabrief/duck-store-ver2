<?php

namespace App\DB;

use App\DB\Connection;

class Categories
{
    public static function getAll(Connection $connection)
    {
        $cat_stmt = $connection->prepare("SELECT * FROM `categories`");
        $cat_stmt->execute();

        return $cat_stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function get($id, Connection $connection)
    {
        $statment = $connection
            ->prepare("SELECT * FROM `categories` WHERE `categories`.`id` = :id");
        $statment->execute(['id' => $id]);

        return $statment->fetch(\PDO::FETCH_ASSOC);
    }
}
