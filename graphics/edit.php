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
		print_r($row);
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
	var_dump ($_POST['id']);
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
<form name = 'edit_image'method = 'POST' action='edit.php'>
<input type='text' name='id' value='<?=$row['id']?>' />
<p>Имя</p>
<input type = text name = 'name' value = '<?=$row['name']?>' />
<p>Текст</p>
<input type = text name = 'out_text' value = '<?=$row['out_text']?>' /><br/>
<p>Ссылка</p>
<input type = text name = 'link' value = '<?=$row['link']?>' /></br><br />
<?php $imageDir = $_SERVER['DOCUMENT_ROOT'].'/graphics/images/';?>
<?php $images = array_diff((scandir($imageDir)), array('..','.'));?>
<select name = 'pic_link'>
<?php foreach($images as $image)
	if($image === $row['pic_link']){ 
?>
<option  value = <?=$image?> selected='selected'><?=$image?></option>
<?php
	}else?>
<option  value = <?=$image?>><?=$image?></option>
</select>
<input type = 'submit' value = 'Отправить' name='save' />
</form>