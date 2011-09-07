<?php
require('Mysql.class.php');
class Membership {
    private $conn;

    function __construct() {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
                      die('There was a problem connecting to the database.');
    }// end contructor

	function validate_user($un, $pwd, $remember = FALSE) {
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);
		$_SESSION['userId'] = $ensure_credentials;
		if($ensure_credentials) {
			$mysql->updateLastLogged($un);
			$_SESSION['status'] = 'authorized';
            if($remember){
                setcookie('rememberMe', $ensure_credentials, time() + 60*60*24*14);
                header("location: index.php");
            }
            header("location: index.php");
		} else unset($_SESSION['status']);
	}  
	
	function log_User_Out() {
		$id = $_SESSION['userId'];
		$mysql2 = New Mysql();
		$mysql2->logoutUser($id);
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			if(isset($_COOKIE['rememberMe']))
				setcookie('rememberMe', '', time() - 1000);
				session_destroy();
		}
	}
	
	function confirm_Member() {
		session_start();
		if($_SESSION['status'] !=('authorized')) header("location: login.php");
	}
	
}