<?php
require_once 'includes/config.inc.php';
require_once 'includes/html.inc.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>New Website - By Mazz</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico">
<!--    <link rel="apple-touch-icon" href="apple-touch-icon.png">-->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/libs/modernizr.min.js"></script>

</head>
<body id="home">
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
     chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->



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
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
    <?php include_once 'includes/analytics.inc.php'; ?>

</body>
</html>