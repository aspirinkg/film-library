<?php
//  require_once('db.php');
 require_once('model/model.php');

session_start();
if($_POST){
    $error = [];
    if($_POST['login']=='admin'){
        if($_POST['pass']=='123456'){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pass'] = $_POST['pass'];
            header('Location: index.php');
        }
        else{
            $error[] = 'Неправильный пароль';
        }
    }
    else{
        $error[] = 'Неправильный логин';
    }
}
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

include('template/header.tpl');
include('template/signin.tpl');
include('template/footer.tpl');