<?php
session_start();

// initializing variables
$uname = "";
$fname    = "";
$lname    = "";
$errors = array(); 

// connects to the database
$db = mysqli_connect('localhost', 'root', '', 'mpnrsys');

// registers a user
if (isset($_POST['reguser'])) {
  // receive all input values from the form
  $fname=mysqli_real_escape_string($db, $_POST['fname']);
  
  $lname=mysqli_real_escape_string($db, $_POST['lname']);
  $uname = mysqli_real_escape_string($db, $_POST['uname']);
  $p1 = mysqli_real_escape_string($db, $_POST['psw']);

  // Validates form.Ensures that it is filled properly 
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($uname)) { array_push($errors, "Username is required"); }
  if (empty($p1)) { array_push($errors, "Password is required"); }
  //if ($p1 != $p2) {
	//array_push($errors, "Passwords do not match!");
  //}


  // checks if username is already within database 
  $user_check_query = "SELECT * FROM user WHERE uname='$uname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // indicates if user exists
    if ($user['uname'] === $uname) {
      array_push($errors, "Username already in database");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
	$password= md5($password);
  	$q = "INSERT INTO user (uID, uname, password, fname, lname) 
  			  VALUES('', '$uname', '$password', '$fname', '$lname')";
  	mysqli_query($db, $q);
  	$_SESSION['username'] = $uname;
  	$_SESSION['success'] = "Login was Successful";
  	header('location: index.html');
  }
}

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['un']);
  $password = mysqli_real_escape_string($db, $_POST['p']);

  if (empty($username)) {
  	array_push($errors, "Please enter username");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  
 

  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM user WHERE uname='$username' AND pwd='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
		
		
  		array_push($errors, "Wrong username and or password");
		header('location: login.php');
  	}
  }
}

?>