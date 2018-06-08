<?php
require('db.php');
require('model/model.php');


$films = get_films($connection);
include('template/header.tpl');
foreach ($films as $key => $value) {
    if($value['genre'] == $_GET['genre']){
        include('template/category.tpl');
    }
}
include('template/footer.tpl');
