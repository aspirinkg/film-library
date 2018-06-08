<div class="panel-holder mt-0 mb-40">
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
          
          <div class="col">
              <label class="label-title">Картинка</label>
              <img src="<?php echo $arr[0]['image'] ?>" alt="alt" width="100">
              <input id="uploadimage"  type="file"  name="image"/>
            </div>
          </div>
          <div class="row">
          <div class="col">
              <label class="label-title">Описание</label>
              <textarea class="textarea" name="description" placeholder="Описание к фильму"><?=$arr[0]['description']?></textarea>
            </div>
          </div>
          <input type="submit" class="button" name="editFilm" value="Изменить">
          <a href="/">На главную</a> 

        </form>
      
      </div>