<?php
define('HOST','127.0.0.1');
define('USER', 'root');
define('PWD', '');
$conn = mysqli_connect(HOST, USER, PWD) or die("error: ".mysqli_error());