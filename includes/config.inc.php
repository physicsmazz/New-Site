<?php
date_default_timezone_set('America/New_York');
ob_start('ob_gzhandler');
session_start();

function __autoload($class_name)
{
    require_once 'classes/' . $class_name . '.class.php';
}

// it's local, use the local db connection
//if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'], '192.168.2')) require_once('includes/connLocal.inc.php');
//else require_once 'includes/conn.inc.php';
//php logging
$php = FirePHP::getInstance(true);
//turn on php logging if local
if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'], '192.168.2')) {
    $php->setEnabled(true);
} else {
    //set false for production.
    $php->setEnabled(false);
}
