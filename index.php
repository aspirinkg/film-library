<?php

 require_once('db.php');
 require_once('model/model.php');

  //DELETE
    if(@$_GET['action'] == 'delete'){
      film_delete($connection, (int) $_GET['id']);
    }
     $objectBd = get_films($connection);
    $arr2 = last_update($connection,5);
    $categories = get_categories($connection);
include('template/header.tpl');
include('template/last.tpl');
include('template/index.tpl');
include('template/footer.tpl');

