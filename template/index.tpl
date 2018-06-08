
<h1 class="title-1"> Фильмотека</h1>
      <?php
      if(!empty($objectBd)){
        foreach($objectBd as $key => $value){
      ?>


      <div class="card mb-20">
        <div class="image-cont">
        <img src="<?=$objectBd[$key]['image']?>" alt="Изображение не загружено" width="200">
        </div>
        <div class="card-info">
        <h4 class="title-4"><?=$objectBd[$key]['name']?></h4>
        <p><?=mb_strimwidth($objectBd[$key]['description'], 0, 450, "..."); ?></p>
        <div class="card-footer">
        <div class="card-footer-info">
        <div class="badge"><?=$objectBd[$key]['genre']?></div>
        <div class="badge"><?=$objectBd[$key]['year']?></div>
        <a class="button" href="/film_page.php?id=<?=$objectBd[$key]['id']?>">Подробнее </a> 
        </div>
        <div class="card-edit">
        <?php
        if(is_admin($_SESSION)) :
        ?>
        <a class="button button--delete" href="?action=delete&id=<?=$objectBd[$key]['id']?>">Удалить
          <i class="fas fa-trash"></i>
        </a>
        <a class="button button--edit" href="edit.php?id=<?=$objectBd[$key]['id']?>">
        <span class="button__icon button__icon--left">
        <i class="fas fa-pencil-alt"></i></span>Редактировать</a>
        <?php endif;  ?>
        </div>
        </div>
            </div>
      </div>

        <?php 
        }}
        else{
          echo '<p>Фильмов нет</p>';
        }
        ?>
     

      