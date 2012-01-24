<?php
require_once 'includes/config.inc.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>New Website - By Mazz</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
<!--    <link rel="apple-touch-icon" href="apple-touch-icon.png">-->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/libs/modernizr-2.0.6.min.js"></script>

</head>
<body>
<div id="noJs">
    You must have JavaScript installed.
</div>
<div id="container">
<?php require_once 'includes/header.inc.php'; ?>

<div id="main" role="main">
This is the main div.   
</div>

<?php
$admin = false;
$ui = false;
require_once('includes/scripts.inc.php');
?>
<script defer src="js/plugins.js"></script>
<script defer src="js/script.js"></script>
    <?php include_once 'includes/analytics.inc.php'; ?>
    <!--[if lt IE 8 ]>
      <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
      <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->

</body>
</html>