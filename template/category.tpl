 <div class="card mb-20">
        <div class="image-cont">
        <img src="<?=$value['image'];?>" alt="Изображение не загружено" width="200">
        </div>
        <div class="card-info">
        <h4 class="title-4"><?=$value['name'];?></h4>
        <p><?=mb_strimwidth($value['description'], 0, 450, "..."); ?></p>
        <div class="card-footer">
        <div class="card-footer-info">
        <div class="badge"><?=$value['genre'];?></div>
        <div class="badge"><?=$value['year'];?></div>
        <a class="button" href="/film_page.php?id=<?=$value['id'];?>">Подробнее </a> 
        </div>
        <div class="card-edit">
        <?php
        if(isset($_SESSION['login'])) :
          if($_SESSION['login'] == 'admin') : 
            if($_SESSION['pass'] == '123456') :
        ?>
        <a class="button button--delete" href="/?action=delete&id=<?=$value['id'];?>">Удалить
          <i class="fas fa-trash"></i>
        </a>
        <a class="button button--edit" href="edit.php?id=<?=$value['id'];?>">
        <span class="button__icon button__icon--left">
        <i class="fas fa-pencil-alt"></i></span>Редактировать</a>
            <?php endif; endif; endif; ?>
        
        </div>
        </div>
            </div>
      </div>