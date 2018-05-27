<?php

 $connection =  mysqli_connect('localhost' , 'root' , '' , 'filmoteka'  );

  if(!$connection){
    exit('соединение не установленно');
  }
    if($_GET['action'] == 'delete'){
      $query = "DELETE FROM `films` WHERE `id` = '".mysqli_real_escape_string($connection,$_GET['id'])."' LIMIT 1";
      mysqli_query($connection , $query);


        if(mysqli_affected_rows($connection)){
          echo 'Фильм успешно удален';
        }
    }
    if($_POST['title']){
        $error = [];
      if($_POST['genre'] == ''){
          $error[] = 'Введите жанр';
      }
  elseif($_POST['year'] == ''){
    $error[] = 'Введите год';
   }
  if($_FILES['image']){
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
   
     $file_ext =explode('.' , $imageName);
     $file_ext = end($file_ext);
     $file_ext = strtolower($file_ext);
     $dir_file = './images/'. $imageName . '.' . $file_ext;
    
     move_uploaded_file($imageTmp , $dir_file);
   }

  if(empty($error)){
    echo 'ошибок нет';
    $queryInsert = "INSERT INTO `films` (`name`, `genre`,`year`,`image`) VALUES ('". mysqli_real_escape_string($connection, $_POST['title']) ."','". mysqli_real_escape_string($connection, $_POST['genre']) ."','". (int) mysqli_real_escape_string($connection, $_POST['year']) ."','".
    mysqli_real_escape_string($connection, $dir_file ) ."')";
    mysqli_query($connection , $queryInsert );

  }else{
    echo 'Заполните поля';
  }

}

  $query = "SELECT * FROM `films`";
  $res =  mysqli_query($connection , $query);

  if(mysqli_num_rows($res) > 0){

    $objectBd = [];
    while( ($result = mysqli_fetch_assoc($res)) ){
        $objectBd[] = $result;  
    }
  }
?>



<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>UI-kit и HTML фреймворк - Документация</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
    <link rel="stylesheet" href="./css/custom1.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="container user-content pt-35">
      <h1 class="title-1"> Фильмотека</h1>
      <?php
      if(!empty($objectBd)){
        foreach($objectBd as $key => $value){
      ?>

      <div class="card mb-20">
        <img src="<?=$objectBd[$key]['image']?>" alt="Изображение не загружено" width="400">
        <h4 class="title-4"><?=$objectBd[$key]['name']?></h4>
        <div class="badge"><?=$objectBd[$key]['genre']?></div>
        <div class="badge"><?=$objectBd[$key]['year']?></div>
        <a href="/film_page.php?id=<?=$objectBd[$key]['id']?>">Подробнее </a> 
        <a href="?action=delete&id=<?=$objectBd[$key]['id']?>">Удалить</a> 
        <a href="edit.php?id=<?=$objectBd[$key]['id']?>">Редактировать</a> 
      </div>

        <?php 
        }}
        else{
          echo '<p>Фильмов нет</p>';
        }
        ?>
     

      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        
        <form action="/" method="POST" enctype="multipart/form-data">

          <div class="error"></div>
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="title"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year"/>
            </div>
          <div class="row">
          <div class="col">
              <label class="label-title">Картинка</label>
              <input id="uploadimage"  type="file"  name="image"/>
            </div>
          </div>
          </div><a class="button" href="regular">Добавить	</a>

        </form>

      </div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript">

    

      	$('.button').on('click' , function(e){
          e.preventDefault();
          
          function showEr(text){
           $('.error').text(text);
           $('.error').fadeIn();
          }

          if($('input[name=title]').val() == ''){
           showEr('Название фильма не может быть пустым.');
          }
          else if($('input[name=genre]').val() == ''){
           showEr('Жанр фильма не может быть пустым.');
          }
          else if($('input[name=year]').val() == ''){
           showEr('Год фильма не может быть пустым.');
          }
          else{
           $('.error').fadeOut(1000,function(){       
             $('form').submit();
           });
          }
});

    </script>
  </body>
</html>