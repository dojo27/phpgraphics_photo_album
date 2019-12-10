<?php
	define('HOST','127.0.0.1');
	define('USER', 'root');
	define('PWD', '');
	define('DB', 'graphdb');
	$conn = mysqli_connect(HOST, USER, PWD, DB) or die("error: ".mysqli_error());