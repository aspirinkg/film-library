<?php

$connection =  mysqli_connect('localhost' , 'root' , '' , 'filmoteka'  );

$res = mysqli_query($connection , "SELECT * FROM `films` WHERE `id` = "  . $_GET['id']);

$result = mysqli_fetch_assoc($res)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/custom1.css"/>
</head>
<body>
    <div class="cart">
    <img src="<?=$result['image']?>" alt="" width="400">
    <h2><?=$result['name']?></h2>
    <p><?=$result['genre']?></p>
    <p><?=$result['year']?></p>
    </div>
</body>
</html>