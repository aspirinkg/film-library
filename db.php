<?php
require_once('config.php');
$connection =  mysqli_connect( MYSQL_SERVER , MYSQL_USER , MYSQL_PASSWORD , MYSQL_NAME  );

if(!$connection){
    exit('соединение не установленно');
}
session_start();
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
