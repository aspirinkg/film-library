<?php


function get_films($connection){
	$query = "SELECT * FROM `films`";
	$res =  mysqli_query($connection , $query);
 $objectBd = [];
	if(mysqli_num_rows($res) > 0){
			$objectBd = [];
				while( ( $result = mysqli_fetch_assoc($res) ) ){
								$objectBd[] = $result;  
				}
	}
	return $objectBd;
};

function get_films_for_edit($connection,$id){
	$films = [];
	$query = "SELECT * FROM `films` WHERE `id` = $id LIMIT 1";
	$res = mysqli_query($connection , $query);
	
	if(mysqli_num_rows($res) > 0){
	$films[] = mysqli_fetch_assoc($res);
	
	return $films;
	}
	else{
		header('Location: error.php');
	}
};

function add_film( $connection, $name , $genre, $year , $file, $description ){
				$error = [];
				if( $genre == '' ){
								$error[] = 'Введите жанр';
				}
				elseif( $year == '' ){
						$error[] = 'Введите год';
				}
				if($file){
				$imageName = $file['name'];
				$imageType = $file['type'];
				$imageTmp = $file['tmp_name'];
				$imageSize = $file['size'];

					$file_ext = explode('.' , $imageName);
					$file_ext = end($file_ext);
					$file_ext = strtolower($file_ext);
					$dir_file = './images/'. $imageName . '.' . $file_ext;

					move_uploaded_file($imageTmp , $dir_file);
				}
					if(empty($error)){
						echo '<div class="error success">Фильм успешно добавлен</div>';
					$queryInsert = "INSERT INTO `films` (`name`, `genre`,`year`,`image`,`description`) VALUES ('". 
									mysqli_real_escape_string($connection, $name) 										."','".
									mysqli_real_escape_string($connection, $genre) 										."','". 
									mysqli_real_escape_string($connection, $year)  										."','".
									mysqli_real_escape_string($connection, $dir_file ) ."','". mysqli_real_escape_string($connection,$description) ."' );";
					mysqli_query($connection , $queryInsert );
					// $query_cat = 'INSERT INTO `categories` (`name`) VALUES ("'. mysqli_real_escape_string($connection,$name) .'")';
					// mysqli_query($connection , $query_cat );
					// echo $query_cat;
					set_category($connection,$genre);
				}
					
					else{
							echo 'Заполните поля';
					}

}
function film_delete($connection,$id){
				$query = "DELETE FROM `films` WHERE `id` = '".mysqli_real_escape_string($connection,$id)."' LIMIT 1";
					mysqli_query($connection , $query);
						if(mysqli_affected_rows($connection)){
										header('Location: index.php');
										echo '<div class="error success">Фильм успешно удален</div>';
						}
							
}

function edit_film($connection , $name , $genre , $year ,$id, $file, $description = 'description'){
	if($file){
	if(is_array($file)){
			$imageName = $file['name'];
			$imageType = $file['type'];
			$imageTmp = $file['tmp_name'];
			$imageSize = $file['size'];
	
				$file_ext = explode('.' , $imageName);
				$file_ext = end($file_ext);
				$file_ext = strtolower($file_ext);
				$dir_file = './images/'. $imageName . '.' . $file_ext;
	
				move_uploaded_file($imageTmp , $dir_file);
			
	}else{
		$dir_file = $file;
	}
}
		echo $dir_file;
		$query = "UPDATE `films` SET 
		`name` = '".mysqli_real_escape_string($connection,$name) ."',
		`genre` = '". mysqli_real_escape_string($connection,$genre) ."',
		`year` ='".mysqli_real_escape_string($connection,$year)."', `image` ='"  . mysqli_real_escape_string($connection, $dir_file ) ."',`description` = '". mysqli_real_escape_string($connection,$description) ."' WHERE `id` ='" . mysqli_real_escape_string($connection,$id) . "'" ;
		if(mysqli_query($connection,$query)){
			echo '<div class="error success">Фильм успешно обновлен</div>';
		}
		else	{echo 'ERROR';};
		
}

function last_update($connection,$limit = 5,$search = 'id'){
	$arr2 = [];
	$query = "SELECT * FROM `films` ORDER BY `$search` DESC LIMIT  $limit";
	$res = mysqli_query($connection,$query);
	while($r =  mysqli_fetch_assoc($res)){
 	 $arr2[] = $r;
	}
	return $arr2;
}

function get_categories($connection){
	$query = "SELECT * FROM `categories`";
	$categories = [];
	$result =  mysqli_query($connection,$query);

	while($res = mysqli_fetch_assoc($result)){
		$categories[] = $res;
	}

	return $categories;
}

function set_category($connection,$name){
	$query = 'INSERT INTO `categories` (`name`) VALUES ("'. mysqli_real_escape_string($connection,$name) .'")';

	if(mysqli_query($connection,$query)){
		echo 'Категория успешно добавлена';
	}else{
		echo 'Произошла ошибка';
		die();
	}
}

function is_admin($session){
	if(isset($session['login'])) {
		if($session['login'] == 'admin'){ 
		  if($session['pass'] == '123456'){
			return true;
		  }
		  
		}
		return false;
	} 
}

