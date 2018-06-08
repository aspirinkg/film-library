<div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        
        <form action="addFilm.php" method="POST" enctype="multipart/form-data">

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
          
          <div class="col">
              <label class="label-title">Картинка</label>
              <input id="uploadimage"  type="file"  name="image"/>
            </div>
          </div>
          <div class="row">
          <div class="col">
              <label class="label-title">Описание</label>
              <textarea class="textarea" name="description" placeholder="Описание к фильму"></textarea>
            </div>
          </div>
          <a class="button buttonJS" href="regular">Добавить</a>
          <a class="button" href="/">На главную</a>

        </form>

      </div>