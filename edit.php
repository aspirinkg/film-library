<?php
     $connection =  mysqli_connect('localhost' , 'root' , '' , 'filmoteka'  );
     if(!$connection){
        exit('соединение не установленно');
      }

      if($_GET['action'] == 'delete'){
        $query = "DELETE FROM `films` WHERE `id` = '".mysqli_real_escape_string($connection,$_GET['id'])."' LIMIT 1";
        mysqli_query($connection , $query);
      }
      $id = $_GET['id'];
    //   echo '<pre>';
    //   print_r($_POST);
    //   echo '</pre>';
    //   echo '<pre>';
    //   print_r($_GET);
    //   echo '</pre>';

if($_POST['editFilm']){
        $title =$_POST['title'];
        $genre =$_POST['genre'];
        $year  =$_POST['year'];
       
      $query = "UPDATE `films` SET `name` = '".mysqli_real_escape_string($connection,$title) ."'
      ,`genre` = '". mysqli_real_escape_string($connection,$genre) ."' 
      ,year ='".mysqli_real_escape_string($connection,$year)."' 
      WHERE `films`.`id` ='" . mysqli_real_escape_string($connection,$id) . "'" ;
      
      
      if(mysqli_query($connection,$query)){
          echo '<div class="error success">Фильм успешно обновлен</div>';
      }else
      echo 'ERROR';
      }

      
      $query = "SELECT * FROM `films` WHERE `id` = $id";
      $res = mysqli_query($connection , $query);
      
    
    $arr[] = mysqli_fetch_assoc($res);
     
      
      


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
    <!--  <h1 class="title-1"> Фильмотека</h1>
     
   
      <div class="card mb-20">
        <img src="<?=$arr[0]['image']?>" alt="Изображение не загружено" width="400">
        <h4 class="title-4"><?=$arr[0]['name']?></h4>
        <div class="badge"><?=$arr[0]['genre']?></div>
        <div class="badge"><?=$arr[0]['year']?></div>
      </div>

         -->
     

      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Редактировать фильм</div>
        
        <form action="?id=<?=$arr[0]['id']?>" method="POST" enctype="multipart/form-data">

          <div class="error"></div>
          <label class="label-title">Название фильма</label>
          <input class="input" type="text"  value="<?=$arr[0]['name']?>" name="title" />
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text"  value="<?=$arr[0]['genre']?>" name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text"  value="<?=$arr[0]['year']?>" name="year"/>
            </div>
          <div class="row">
          <div class="col">
              <label class="label-title">Картинка</label>
              <input id="uploadimage"  type="file"  name="image"/>
            </div>
          </div>
          </div>
          <input type="submit" class="button" name="editFilm" value="Изменить">
          <a href="?action=delete&id=<?=$arr[0]['id']?>">Удалить</a> 
          <a href="/">На главную</a> 

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

    

      	// $('.button').on('click' , function(e){
        // //   e.preventDefault();
          
        //   function showEr(text){
        //    $('.error').text(text);
        //    $('.error').fadeIn();
        //   }

        //   if($('input[name=title]').val() == ''){
        //    showEr('Название фильма не может быть пустым.');
        //   }
        //   else if($('input[name=genre]').val() == ''){
        //    showEr('Жанр фильма не может быть пустым.');
        //   }
        //   else if($('input[name=year]').val() == ''){
        //    showEr('Год фильма не может быть пустым.');
        //   }
        //   else{
        //    $('.error').fadeOut(1000,function(){       
        //     //  $('form').submit();
        //    });
        //   }
});

    </script>
  </body>
</html>