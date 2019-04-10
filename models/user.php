<?php

class User {
	private $id;
	private $firstName;
	private $lastName;
	private $jobTitle;
	private $email;
	private $password;
	private $avatar;
	private $type;
	private $isActive;

	
	function __construct($id, $firstName, $lastName, $jobTitle, $email, $password, $avatar, $type, $isActive = 1){
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->jobTitle = $jobTitle;
		$this->email = $email;
		$this->password = $password;
		$this->avatar = $avatar;
		$this->type = $type;
		$this->isActive = $isActive;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getFirstName(){
		return $this->firstName;
	}
	public function getLastName(){
		return $this->lastName;
	}
	public function getJobTitle(){
		return $this->jobTitle;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getAvatar(){
		return $this->avatar;
	}
	public function getType(){
		return $this->type;
	}
	public function getIsActive(){
		return $this->isActive ? 'yes' : 'no';
	}
	public static function setIsActive($arg){
		return ($arg == NULL ) ? 0 : 1;
		// if ($arg == "on") {
		// 	return 1;
		// } else {
		// 	return "0";
		// }
	}

	public static function create($data) {

		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		$jobTitle = $data['jobTitle'];
		$email = $data['email'];
		$password = $data['password'];
		$avatar = $data['avatar'];
		$type = $data['type'];
		$isActive = User::setIsActive($data['isActive']);


		// var_dump($data['isActive']);

// var_dump($data);
		$db = connect(); 

		$query = $db->query("INSERT INTO users (firstName, lastName, jobTitle, email, password, avatar, type, isActive) VALUES ('$firstName', '$lastName', '$jobTitle', '$email', '$password', '$avatar', '$type', '$isActive') ");
		// return $new_id; 
	}

	public static function findAll(){
		$db = connect(); 
		$query = $db->query("SELECT * FROM users");

		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		if ($rows) {	// ima usera =>  vracam sve 
			    return $rows;
		} else {
		  	// nema usera vracam null 
		  	return null;
		}
	}
	public static function findById($id){
		$db = connect(); 
		$query = $db->query("SELECT * FROM users WHERE id='$id'");

		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		if ($rows) {	// ima usera =>  vracam id koji se onda cuva u session
			    // return $id;
			return $rows;
		} else {
		  	// nema usera vracam null 
		  	return null;
		}
	}

  	public static function findByEmail($email) {

	  	$db = connect(); 
	  	$query = $db->query("SELECT * FROM users WHERE email='$email'");
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	    if ($rows) {  // ima usera =>  vracam sve 
	          // return $rows;
	          return $email;
	    } else {
	        // nema usera vracam null 
	        return null;
	    }
	}
	public static function createFromEmail($email) {
		$db = connect(); 
		$query = $db->query("SELECT * FROM users WHERE email='$email'");


		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		if ($rows) {	// ima usera 
			// echo "ima usera";
			// var_dump($rows[0]['id']);
			// echo "<br>rows[0][0]['id']";
			// var_dump($rows[0]);
			$id = $rows[0]['id'];
			$firstName = $rows[0]['firstName'];
			$lastName = $rows[0]['lastName'];
			$jobTitle = $rows[0]['jobTitle'];
			$email = $rows[0]['email'];
			$password = $rows[0]['password'];
			$avatar = $rows[0]['avatar'];
			$type = $rows[0]['type'];
			$isActive = $rows[0]['isActive'];
// print_r($firstName);


			$currentUser = new User($id, $firstName, $lastName, $jobTitle, $email, $password, $avatar, $type, $isActive);
			return $currentUser;
		}
		return null;
	}

	public static function updateById($id, $data) { 
		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		$jobTitle = $data['jobTitle'];
		$email = $data['email'];
		$password = $data['password'];
		$avatar = $data['avatar'];
		$type = $data['type'];
		$isActive = $data['isActive'];

	    $db = connect(); 
	    $query = $db->query("UPDATE users SET firstName = '$firstName' , lastName = '$lastName' , jobTitle = '$jobTitle' , email = '$email', password = '$password' , avatar = '$avatar' , type = '$type' , isActive = '$isActive'  WHERE id='$id'");

	    return $id; 
	    // return $request["params"]["id"]; 
	  }

	  public static function deleteById($id) {
	    // $users = self::$users;
	    // unset($users[$id]);

	    $db = connect(); 
	    $query = $db->query("DELETE FROM users WHERE id='$id'");
	  }


}