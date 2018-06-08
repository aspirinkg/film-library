<?php
session_start();
if($_POST){

if( $_POST['name'] != ''){
setcookie('name' ,$_POST['name'], time() + 60*60*24);
}
if( $_POST['city'] != ''){
    setcookie('city' ,$_POST['city'], time() + 60*60*24);
}
header('Location: form.php');
}

include('template/header.tpl');
include('template/form.tpl');
include('template/footer.tpl');
