<?php
require_once('db.php');
require_once('model/model.php');
if(@$_GET['action'] == 'delete'){
  film_delete($connection, (int) $_GET['id']);
}

$result = get_films_for_edit($connection, $_GET['id'])[0];

if($_POST){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];

  $query = "INSERT INTO  `comments` (`name`, `email`,`comment`,`film_id`) VALUES ('$name' , '$email' , '$comment' , '$_GET[id]' ) ";
  mysqli_query($connection,$query);
}




include('template/header.tpl');
include('template/film-page.tpl');
include('template/footer.tpl');

  
