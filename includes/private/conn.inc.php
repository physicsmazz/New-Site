<?php
if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'],'192.168.2') || $_SERVER['HTTP_HOST'] == '127.0.0.1'){
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'physicsmazz');
    define('DB_PASSWORD', 'mazz6288');
    define('DB_NAME', 'todolist');
}else{
    define('DB_SERVER', 'xx.xx.xx.xx');
    define('DB_USER', 'mazztodo');
    define('DB_PASSWORD', 'Mazz6299ToDo');
    define('DB_NAME', 'mazztodo');
}
$conn = new mySQLi (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());



