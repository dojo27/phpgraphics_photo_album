<?php
if (isset($_POST['delOk'])){
	$sql = 'DELETE FROM graph WHERE id = '.addslashes($_POST['rec_id'])."';";
	echo 'Удаление завершено';
}
else if (isset($_POST['cancel']))
{
	echo 'Удаление отменено';
}
	echo '<a href="index.php">На главную</a>';
?>
<form action='del.php' name = 'rec_id' method='post'>
	<input type='hidden' value='<?=$_GET['id_']?>' />
	<input type='submit' name='delOk' value='удалить' />
	<input type='submit' name='cancel' value='отменить' />
</form>