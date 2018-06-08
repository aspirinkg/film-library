<div class="card mb-20">
        <div class="image-cont">
        <img src="<?=$result['image']?>" alt="Изображение не загружено" width="200">
        </div>
        <div class="card-info">
        <h4 class="title-4"><?=$result['name']?></h4>
        <p><?=$result['description'] ?></p>
        <div class="card-footer">
        <div class="card-footer-info">
        <div class="badge"><?=$result['genre']?></div>
        <div class="badge"><?=$result['year']?></div>
        <a class="button" href="/">На главную</a>
        </div>
        <div class="card-edit">
        <?php
        if(isset($_SESSION['login'])) :
          if($_SESSION['login'] == 'admin') : 
            if($_SESSION['pass'] == '123456') :
        ?>
        <a class="button button--delete" href="/?action=delete&id=<?=$result['id']?>">Удалить
          <i class="fas fa-trash"></i>
        </a>
        <a class="button button--edit" href="edit.php?id=<?=$result['id']?>">
        <span class="button__icon button__icon--left">
        <i class="fas fa-pencil-alt"></i></span>Редактировать</a>
            <?php endif; endif; endif; ?>
        
        </div>
        </div>
        </div>
        
    </div>
<form action="film_page.php?id=<?=$result['id']?>" method="POST" >
    <div class="error"></div>
    <label class="label-title">Имя</label>
    <input class="input" type="text" placeholder="Такси 2" name="name"/>
    <div class="row">
    <div class="col">
        <label class="label-title">Email</label>
        <input class="input" type="text" placeholder="комедия" name="email"/>
    </div>
    </div>

    <div class="row">
    <div class="col">
        <label class="label-title">Текст комментария</label>
        <textarea class="textarea" name="comment" placeholder="Текст комментария"></textarea>
    </div>
    </div>
    <a class="button buttonJS" href="regular">Добавить</a>
    <a class="button" href="/">На главную</a>
</form>

<?php
    $query = "SELECT * FROM `comments` WHERE film_id = '$_GET[id]' ORDER BY `name` DESC";
    $res = mysqli_query($connection,$query);
    while($r = mysqli_fetch_assoc($res)){
        $comments[] = $r;
    }
if(mysqli_num_rows($res) > 0){
    foreach ($comments as $key => $value) {
        ?>
            <div style="margin: 10px 0;    box-shadow: 0px 10px 40px 0px rgba(99, 117, 138, 0.3);padding: 5px;">
                <p>Имя:<?php echo $value['name']; ?></p>
                <p>Email:<?php echo $value['email']; ?></p>
                <p>Комментарий:<br><?php echo $value['comment']; ?></p>
            </div>
        <?php
    }
}
?>


<div>
    <p></p>
    <p></p>
    <p></p>
</div>