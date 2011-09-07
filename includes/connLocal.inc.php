<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'physicsmazz');
define('DB_PASSWORD', 'mazz6288');
define('DB_NAME', 'todolist');
$conn = new mySQLi (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());