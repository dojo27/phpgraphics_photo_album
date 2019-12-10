<?php
header('location: index.php');
include "connect.php";
if (isset($_GET['id_']))
{
	$id = addslashes($_GET['id_']);
	$sql = "DELETE FROM graph WHERE id='$id'";
	$conn->query($sql);
}?>
