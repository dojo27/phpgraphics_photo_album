<?php
header("location: index.php");
require 'connect.php';
if(isset($_POST['message']))
{
	$msg = addslashes($_POST['message']);
	$sql = $conn->query("insert into comments set message='$msg';") or die();
}
?>