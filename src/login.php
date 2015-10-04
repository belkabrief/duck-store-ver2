<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php'; 

if(empty($_POST)
    || (!isset($_POST['username']) || !isset($_POST['password']))
){
    if (isset($_SESSION['error'])) {
        echo "<h1>{$_SESSION['error']}</h1>";
        unset($_SESSION['error']);
    }
	include_once __DIR__ . '/templates/_login_form.php';
	include_once __DIR__ . '/templates/_footer.php';
} else {
    $usernameStored = 'admin';
    $passwordStored = md5('123');
	$checkPassword = md5($_POST['password']);
    if ($_POST['username'] == $usernameStored && $checkPassword == $passwordStored){
        $_SESSION['user_id'] = 1;
        header('Location: ' . \App\Utilities\Options::URL);
    } else {
        $_SESSION['error'] = 'Неправильные данные';
        header('Location: ' . '/login');
    } 
}