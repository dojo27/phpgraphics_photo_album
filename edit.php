<link rel='stylesheet' type='text/css' href='styles/bootstrap.css' />
<?php 
require 'connect.php';
if(isset($_GET['id_']))
{
	$id = addslashes($_GET['id_']);
	if ($id > 0)
	{
		$sql = "SELECT id, name, out_text, link, pic_link FROM graph WHERE id = '$id';";
		$res = $conn->query($sql);
		$row = mysqli_fetch_assoc($res);
	}
	else
	{
		$row = [];
		$row['id'] = '';
		$row['name'] = '';
		$row['out_text'] = '';
		$row['link'] = '';
		$row['pic_link'] = '';
	}
}
if(isset($_POST['save']))
{
	if(!($_POST['id']))
	{
		$sql = "INSERT INTO graph (name, out_text, link, pic_link)
			VALUES ('".addslashes($_POST['name'])."', '".addslashes($_POST['out_text'])."', '".addslashes($_POST['link'])."', '".addslashes($_POST['pic_link'])."');";
		if ($conn->query($sql))
			echo 'Запись добавлена!';
		else echo 'Ошибка!';
	}
	else
	{
		$id = addslashes($_POST['id']);
		$sql = "UPDATE graph SET name = '".addslashes($_POST['name'])."', out_text='".addslashes($_POST['out_text'])."', link='".addslashes($_POST['link'])."', pic_link='".$_POST['pic_link']."' WHERE id=$id;";
		$res = $conn->query($sql);
		print_r ($res);
	}
	$conn->close();
}
?>
<h1>Добавить запись</h1>
<form name = 'edit_image'method = 'POST' action='edit.php'>
<div class='form-group'>
<input type='hidden' name='id' value='<?=$row['id']?>' />
<label class='form-control-lg col-xs-3'>Имя</label>
<input class='form-control' type = text name = 'name' col = '4' value = '<?=$row['name']?>' class='form-control form-control-lg' />
<label class='form-control form-control-lg'>Текст</label>
<textarea class = 'form-control form-control-lg' name = 'out_text'><?=$row['out_text']?></textarea><br/>
<label class='form-control form-control-lg'>Ссылка</label>
<input class = 'form-control form-control-lg' type = text name = 'link' value = '<?=$row['link']?>' /></br><br />
<?php $imageDir = $_SERVER['DOCUMENT_ROOT'].'/graphics/images/';
$images = array_diff((scandir($imageDir)), array('..','.'));
echo "<select name = 'pic_link' class='form-control form-control-lg'>";
foreach($images as $image){
	if ($image == $row['pic_link']){
			echo "<option selected>$image</option>";
	}else {
		echo "<option value=$image>$image</option>";
	}
}
?>
</select>
<input type='submit' name='save' value='Отправить' class='btn btn-success btn-large' />
</form>
<br /><br /><br /><br />
<a href = 'index.php'><- Вернуться на главную страницу</a>