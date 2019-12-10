<!DOCTYPE html>
<html>
<?php 
	require 'connect.php';
	$sql = 'SELECT id, name, link, pic_link, out_text FROM graph;';
	$res = $conn->query($sql);
?>
<head>
	<meta charset = 'utf8' />
	<title>Коллекция фотографий</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<a href='edit.php?id_=-1'><input type='button' class='btn-primary btn-lg' value='Добавить новую запись'/></a>
	<a href='upload.php'><input type='button' class='btn-primary btn-lg' value='Загрузить новое изображение'/></a>
	<hr />

	<div class='table-responsive'>
		<table class='table'>
			<tr>
				<th>#</th>
				<th>Имя</th>
				<th>Текст</th>
				<th>Фон</th>
				<th>*</th>
				<th></th>
			</tr>
			<?php
				while($row = $res->fetch_assoc())
				{
					?>
					<tr>
						<td><?=$row['id']?></td>
						<td><?=$row['name']?></td>
						<td><?=$row['out_text']?></td>
						<td><a href='images/<?=$row['pic_link']?>' ><img src='images/<?=$row['pic_link']?>' alt = '<?=$row['pic_link']?>' class='img-fluid rounded' width = 630 height = 100 /></a></td>
						<td colspan='3'><a href='image_show.php?link_=<?=$row['link']?>'><button class='btn-success'>Просмотр</button></a>
						
							<a href='edit.php?id_=<?=$row['id']?>'><button class='btn-info'>Редакировать</button></a>
						
							<a href = 'del.php?id_=<?=$row['id']?>'><button class='btn-danger'>Удалить</button></a>
						</td>
			
			
					</tr>
				<?php }?>
		</table>
	</div>
	
<div>
<?php
$sql = $conn->query('SELECT date, message FROM comments');
while($row  = mysqli_fetch_assoc($sql)){
?>
<p><?=$row['date'].'<br/>'.$row['message']?></p>
<?php } ?>
<form method='POST' action='comments.php'>
<textarea name='message' cols=100 rows=10></textarea><br/>
<input type='submit' class='btn-success'  value='Отправить' />
</form>
</body>
</html>