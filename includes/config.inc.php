<?php
date_default_timezone_set('America/New_York');
ob_start('ob_gzhandler');
session_start();

function __autoload($class_name)
{
    require_once 'classes/' . $class_name . '.class.php';
}

//db connection
//require_once 'includes/conn.inc.php';
