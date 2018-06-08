<?php
 require_once('db.php');
 require_once('model/model.php');
 $id = (int) $_GET['id'];      
 
 
 $arr = get_films_for_edit($connection,$id);
    if(@$_POST['editFilm']){
        $title = htmlspecialchars($_POST['title']);
        $genre = htmlspecialchars($_POST['genre']);
        $year  = htmlspecialchars($_POST['year']);
        $image = empty($_FILES['image']['name']) ? $arr[0]['image'] : $_FILES['image'];
        $description = htmlspecialchars($_POST['description']);
        edit_film($connection,$title,$genre,$year,$id, $image, $description );
      }
      $arr = get_films_for_edit($connection,$id);
    
  include('template/header.tpl'); 
  include('template/edit-film.tpl');
  include('template/footer.tpl');

    