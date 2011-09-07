<?php
class Mysql {
	private $conn;
	private $arr=array();
		function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}

    function minToHours($numMinutes){
        $hours = (int)($numMinutes / 60);
        $minutes = (int)($numMinutes % 60);
        return array('minutes'=>$minutes, 'hours'=>$hours);
    }
	
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT user_id,last_logged FROM users	WHERE username = ? AND password = ?	LIMIT 1";
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->bind_result($userId,$lastLogged);
			$stmt->execute();
			$stmt->fetch();
			$stmt->close();
			setcookie('lastLogged',$lastLogged,time()+360000);
			return $userId;
		}else {return 0;}
	}
	
	function updateLastLogged ($un){
		$q = "UPDATE users SET last_logged = logged,loggedIn = 1 WHERE username = ?";
		if($stmt = $this->conn->prepare($q)) {
			$stmt->bind_param('s', $un);
			$stmt->execute();
			$stmt->fetch();
			$stmt->close();
			return true;
		}else {return false;}
	}
	
	function logoutUser($id){
		$q = "UPDATE users SET loggedIn = 0 WHERE user_id = ?";
		if($stmt = $this->conn->prepare($q)) {			
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->fetch();
			$stmt->close();
			return true;
		}else {
			return false;
		}
	}
	
	function userByGroup($id){
		$q='SELECT users.user_id,users.first_name FROM users JOIN user_group ON users.user_id=user_group.user_id WHERE group_id='.$id;
		if($stmt = $this->conn->query($q)) {
			while($row=$stmt->fetch_assoc()){
				$arr[]=$row;
			}return $arr;
		}else {return 'could not get users';}
	}//end clientNameByGroup
	
	function clientNameByGroupId($id){
		$q='SELECT clients.client_id,client_name FROM clients JOIN client_group ON clients.client_id=client_group.client_id WHERE group_id='.$id.' ORDER BY client_name';
		if($stmt = $this->conn->query($q)) {
			while($row=$stmt->fetch_assoc()){
				$arr[]=$row;
			}return $arr;
		}else {return 'could not join clients';}
	}//end clientNameByGroup
	
	function getClientsByGroupId($id){
			$q = 'SELECT client_id FROM client_group WHERE group_id ='.$id;
		if($stmt = $this->conn->query($q)) {
			while($row=$stmt->fetch_array()){
				$arr[]=$row;
			}return $arr;
		}else {return false;}	
	}
	
	function getClientNameById($id){
		$q='SELECT client_name FROM clients WHERE client_id=?';
		if($stmt=$this->conn->prepare($q)){
			$stmt->bind_param('i',$id);
			$stmt->execute();
			$stmt->bind_result($name);
			if($stmt->fetch()){
				return $name;
			}else return 'Could not fetch the results.';
			$stmt->close();
		}else return 'Problem getting the name';
	}
		
	function getTasksByOwnerId($id){
		$q = 'SELECT task_id FROM user_task WHERE owner_id='.$id;
		if($stmt = $this->conn->query($q)) {			
			while ($taskId = $stmt->fetch_row()){$arr[]=$taskId[0];}
			return $arr;
		}else {return 'Problem getting the task ids';}	
	}
	
	function tasksById($id){
	$q = 'SELECT task_id FROM tasks';
		if($stmt = $this->conn->query($q)) {			
			$taskId = $stmt->fetch_array(MYSQLI_NUM);
			return $taskId;
		}else {
			return false;
		}	
	}
	
	function getClients(){
		$q='SELECT * FROM clients';
		$stmt = $this->conn->query($q);
		while($row=$stmt->fetch_assoc()){
			$arr[]=$row;
		}
		return $arr;
	}
	
	function selectByUser($id){
		$query='SELECT task_id,name,priority FROM tasks WHERE task_id IN (SELECT task_id FROM owners WHERE task_owner='.$id.')';
		$stmt = $this->conn->query($q);
		if($row=$stmt->fetch_assoc()){
			return $row;
		}else return false;
	}
	
	function getOwnerEmail($id){
		$query='SELECT email FROM users WHERE user_id = ?';
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->bind_result($email);
		$stmt->execute();
		$stmt->fetch();
		$stmt->close();
		return $email;
	}//end getOwnerEmail
	
	function getCreatorEmail($id){
		$query='SELECT email FROM users WHERE user_id = ?';
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->bind_result($email);
		$stmt->execute();
		$stmt->fetch();
		$stmt->close();
		return $email;
	}//end getCreatorEmail
	
	function getCreatorId($taskId){
		$query='SELECT creator_id FROM tasks WHERE task_id = ?';
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param('i',$taskId);
		$stmt->bind_result($id);
		$stmt->execute();
		$stmt->fetch();
		$stmt->close();
		return $id;
	}//end getCreatorId
	
	function addTask($name,$details,$creator,$category,$priority){
		$q='INSERT INTO tasks (name,details,creator_id,category,priority) VALUES (?,?,?,?,?)';
		if($stmt=$this->conn->prepare($q)){
			$stmt->bind_param('ssiii',$name,$details,$creator,$category,$priority);
			$stmt->execute();
			$taskId=$stmt->insert_id;
			return $taskId;
		}else return 'Could Not Add the Task';
	}//end addTask
	
	function addTasks($taskId,$userId){
		$q='INSERT INTO user_task (owner_id,task_id) VALUES (?,?)';	
		if($stmt=$this->conn->prepare($q)){
			$stmt->bind_param('ii',$userId,$taskId);
			$stmt->execute();
			return 'Task Added';
		}else return 'add Task failed';
	}
	
	function getTaskInfo($taskId){
		$query='SELECT name,details,percentDone FROM tasks WHERE task_id = '.$taskId;
		$stmt = $this->conn->query($query);
		if($row = $stmt->fetch_assoc()){
			return $row;
		}else return false;
		$stmt->close();
	}//end getTaskInfo
	
}