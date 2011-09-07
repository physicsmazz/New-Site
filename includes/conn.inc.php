<?php
define('DB_SERVER', 'xx.xx.xx.xx');
define('DB_USER', 'mazztodo');
define('DB_PASSWORD', 'Mazz6299ToDo');
define('DB_NAME', 'mazztodo');
$conn = new mySQLi (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());