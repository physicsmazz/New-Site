<?php
class MyException extends Exception{
    function __construct($message = null, $code = 0){
        parent::__construct($message, $code);
        $this->logError();
        if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'],'192.168.2')){
            //LOCAL
        }else{
            $this->sendEmail();
        }
    }
    protected function logError(){
        if($fp = fopen('mysql_errors.txt','a')){
            $logMsg = date('[Y-m-d H:i:s]') . " Message: {$this->getMessage()}\n";
            fwrite($fp,$logMsg);
            fclose($fp);
        }
    }
    protected function sendEmail(){
        $mail = new PHPMailer();
        $mail->AddAddress('physicsmazz@gmail.com', 'Mazz');
        $mail->MsgHTML("There was a problem with Berkshire Organics Test Site <br>{$this->getMessage}");
        $mail->Subject = 'Problem with The Wicked Stix';
        $mail->SetFrom('donotreply@thewickedstix.com', 'The Wicked Stix');
        $result = $mail->Send();
    }
}