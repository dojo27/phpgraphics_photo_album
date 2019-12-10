<link href='stylies/bootstrap.css' rel='stylesheet' type='text/css' />
<?php
	if (isset($_FILES['bgimage']))
	{
		if ($_FILES['bgimage']['type'] != 'image/jpeg')
			die('Для фона необходим формат jpeg');
		$bgimage = $_FILES['bgimage']['name'];
		move_uploaded_file($_FILES['bgimage']['tmp_name'], 'images/'.$bgimage);
	die("Файл $bgimage загружен<br /><br />"."<a href='upload.php'>Загрзить еще один файл</a><a href='index.php'>На главную</a><br /><br /><img src = 'images/".$bgimage."' width=400 />");
	}
?>
<form name='upload_file' method='post' enctype='multipart/form-data'>

Изображение
<input type='file' name='bgimage' /><br />
<input type='submit' value='Загрузить' />
</form>