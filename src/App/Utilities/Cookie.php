<?php
namespace App\Utilities;
class Cookie
{
	public static function getBascketAmount()
    {
		$val = 0;
		if (isset($_COOKIE['products'])){
			$prodInCart = $_COOKIE['products'];
			foreach ($prodInCart as $id => $value) {
				$val += $value;
			}
		}
        return $val;
    }
}