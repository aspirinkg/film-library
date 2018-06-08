    <div class="cont_cat">
    <ul>
    <h4>Категории</h4>
    <?php
    
    
    foreach ($categories as $key => $value) :
        foreach ($objectBd as $key1 => $value1) :
            if($categories[$key]['name'] == $objectBd[$key1]['genre']):
           
        
    ?>
    <li><a href="category.php?genre=<?=$categories[$key]['name'];?>"><?=$categories[$key]['name'];?></a>
    <!-- <a class="button button--delete" href="?deleteCat=<?=$categories[$key]['name']?>">Удалить</a></li> -->
    <?php   break;endif;endforeach;endforeach;  ?>
    </ul>
    <ul>
    <h4>Недавно добавленные</h4>
    <?php
    foreach ($arr2 as $key => $value) {
    ?>
    <li><a href="film_page.php?id=<?=$arr2[$key]['id'];?>"><?=$arr2[$key]['name'];?></a></li>
    <?php } ?>
    </ul>
    </div>