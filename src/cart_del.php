<?php
if (isset($_GET['item']) && is_numeric($_GET['item'])) {
    $item = $_GET['item'];
    setcookie("products[" . $item . "]","",time() - 3600); 
}
header("Location: " . \App\Utilities\Options::URL . "cart");