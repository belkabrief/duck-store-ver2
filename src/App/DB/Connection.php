<?php

namespace App\DB;

class Connection {
    private $connection = NULL;

    public function __construct($username, $password,$tcon = NULL)
    {
		if (is_object($tcon)){
			$this->connection=$tcon;
		}
		else{
			try {
				$this->connection = new \PDO(
					'mysql:host=localhost;dbname=ducks_store;charset=utf8',
					$username,
					$password
				);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }
}
