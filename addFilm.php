<?php
 require_once('db.php');
 require_once('model/model.php');
$film_title = @$_POST['title'];
if($film_title){
        $film_genre =  $_POST['genre'];
        $film_year  =  $_POST['year'];
        $film_image =  $_FILES['image'];
        $description = $_POST['description'];
        add_film( $connection , $film_title , $film_genre , $film_year , $film_image, $description );
}
include('template/header.tpl');
include('template/addfilm.tpl');
include('template/footer.tpl');