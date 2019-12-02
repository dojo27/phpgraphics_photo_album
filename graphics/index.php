<!DOCTYPE html>
<html>
<head>
	<meta charset = 'utf8' />
	<title>Коллекция фотографий</title>
</head>
<?php 
	require 'connect.php';
	$sql = 'SELECT id, name, link, pic_link, out_text FROM graph;';
	$res = $conn->query($sql);
?>
<body>
	<a href="edit.php?id_=-1">Добавить</a>
	<a href = "upload.php">Добавить изображение</a>
	<table>
		<tr>
			<th>Код</th>
			<th>Имя</th>
			<th>Текст</th>
			<th>Фон</th>
			<th>Просмотр</th>
			<th>*</th>
		</tr>
		<?php
			while($row = $res->fetch_assoc())
			{
				?>
				<tr>
					<td><?=$row['id']?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['out_text']?></td>
					<td><img src='images/<?=$row['pic_link']?>' alt = '<?=$row['pic_link']?>' width = 300 /></td>
					<td><a href='image_show.php?link_=<?=$row['link']?>'><?=$row['link']?></a></td>
					<td>
						<a href='edit.php?id_=<?=$row['id']?>'>Редактировать</a>
					</td>
					<td>
						<a href = 'del.php?id_=<?=$row['id']?>'>Удалить</a>
					</td>
				</tr>
			<?php }?>
	</table>
</body>
</html>