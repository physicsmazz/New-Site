<?php
if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'], '192.168.2')) {
    if($admin){
        echo('<script src="../js/libs/jquery-1.6.3.min.js"></script>');
        if($ui){
            echo('<script src="../js/libs/jquery-ui-1.8.16.custom.min.js"></script>');
        }
    }else{
        echo('<script src="js/libs/jquery-1.6.3.min.js"></script>');
        if($ui){
            echo('<script src="js/libs/jquery-ui-1.8.16.custom.min.js"></script>');
        }
    }

} else {
    echo<<<HEREDOC
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.3.min.js"><\/script>')</script>
HEREDOC;
    if($ui){
        echo ("<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>");
    }
}
?>
