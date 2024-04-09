<?php 
include('connect.php');

session_start();
date_default_timezone_set('Asia/Jerusalem');
$ActiveSESSIONS = count(scandir(ini_get("session.save_path")));

$username = "";
$email    = "";
$errors   = array(); 
  
	if (isset($_POST['register'])) {
		register();
		}	
	
	if (isset($_POST['update'])) {
		UpdateUser();
		}
	 
	if (isset($_POST['login_btn'])) {
		login();
		}

	if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['user']);
		header("location:index.php");
	}
   
  
	function register(){
		global $db, $errors;
 		$fname    =  e($_POST['fname']);
		$lname    =  e($_POST['lname']);
 		$email    =  e($_POST['email']);
  		$password1=  e($_POST['password1']);
		$password2=  e($_POST['password2']);

		if (empty($fname)) { 
			array_push($errors,"First Name Required"); 
		}
		if (empty($lname)) { 
			array_push($errors, "Second Name Required"); 
		}
  
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
 
		if (empty($password1)) { 
			array_push($errors,"Password is required"); 
		}
		if (empty($password2)) { 
			array_push($errors, "Confirm Password Required"); 
		}
		if ((isset($password1)) &&(isset($password2)) &&($password1 != $password2)) {
			array_push($errors, "The two passwords do not match");
		}

		$sql1 = "SELECT email FROM users WHERE email='$email' ";
		$result = mysqli_query($db, $sql1);
		if (mysqli_num_rows($result) > 0) {
			array_push($errors, "This mail is already in use.");
		}	


		if (count($errors) == 0) {
			$password = md5($password1);
  		  
			////////////////////////////////////////////
		$query = "INSERT INTO users (fname, lname, email, password  ) 
					VALUES('$fname', '$lname','$email', '$password')";
 
				if (mysqli_query($db, $query) == true) {
					header('location: login.php');
				}
 
		}

	}
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=".$id;
 		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}
 
	function login(){
		global $db, $username, $errors;

		$email = e($_POST['username']);
		$password = e($_POST['password']);
	
		if ($email == NULL) {
			array_push($errors, "Email is required");
		}
		if ($password == NULL) {
			array_push($errors, "  Password is required    ");
		}

		if (count($errors) == 0) {
		
		$query = "SELECT * FROM users WHERE email = '$email'  LIMIT 1";
 
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		$password = md5($password);
		if ($password == $row['password']) {

			if (mysqli_num_rows($result) == 1) { // user found

				   @$status = ActivatyChiker(@$email);
 
					if (@$status == 1) {

					$_SESSION['user'] = $row;
					 	
					if ($_SESSION['user']['type'] == 0) {

					header('location: index.php');

					}elseif ($_SESSION['user']['type'] == 1 ) {

					header('location: admin/index.php');

					} 
 
				 }

					 else{
						array_push($errors, " The account is pending confirmation by the administrator");

				 }
				
				} 
		  }else{
			array_push($errors, " Wrong username or password ");
		  }
		}
	}

	function ActivatyChiker($email)
	{
		global $db;
		$query = "SELECT activity FROM users WHERE email = '".$email."'";
 		$result = mysqli_query($db, $query);
 		if ($result->num_rows > 0) {
				$user = mysqli_fetch_assoc($result);
			}			
		return $user['activity'];
		 
	}

 
	@$FullName  = $_SESSION["user"]["fname"]." ".$_SESSION["user"]["lname"];
	
	function isLoggedIn()
	{
		
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isLoggedInEcho()
	{
		
		if (isset($_SESSION['user'])) {
			echo 'true';
		}else{
			echo 'false';
		}
	}


	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'Admin' ) {
			return true;
		}else{
			return false;
		}
	}

	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="alert alert-danger">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}



	function countReports(){
		global $db;
  		$query = "SELECT id FROM reports ";
 		$result = mysqli_query($db, $query);
 		if ($result->num_rows > 0) {
			return $result->num_rows;
			}			
		}

 

	function countClients(){
		global $db;
  		$query = "SELECT id FROM users";
 		$result = mysqli_query($db, $query);
 		if ($result->num_rows > 0) {
			return $result->num_rows;
			}			
		}

	function countMethods(){
		global $db;
  		$query = "SELECT id FROM history";
 		$result = mysqli_query($db, $query);
 		if ($result->num_rows > 0) {
			return $result->num_rows;
			}			
		}

   function getReportID($id){
    global $db;
    $query = "SELECT * FROM reports WHERE id=".$id;
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
  }


   function getFromDB($tabel , $colom, $value , $select ){
		global $conn;

		$sql = "SELECT ".$select." from ".$tabel." where ".$colom." like  '".$value."' ";

		 // echo $sql; 
		   $SqlResult = $conn->query($sql);
		      if ($SqlResult->num_rows > 0) {
		         $SqlRow = $SqlResult->fetch_assoc();
		         $Data   = (object) $SqlRow;

		         return  $Data -> $select;
		         }
		          else {
		           return 'No Data ..'   ;
		                  }
		  }

  	function getUserFullName($uid){
		global $db;
		$fullName ='' ;
		if ($uid!=null) {
			$query = "SELECT * FROM users WHERE id=".$uid;
	 		$result = mysqli_query($db, $query);
	 		
			if (mysqli_num_rows($result)  > 0) { // user found
	 				$user = mysqli_fetch_assoc($result);
					$fullName = $user['fname'].' '. $user['lname'];
				}			
			return $fullName;
		}
		return null;

	}
  

?>