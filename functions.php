<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'rsbuahhati');

// variable declaration
$nama = "";
$username = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $nama, $username;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $id_user     =  e($_POST['id_user']);
    $nama  =  e($_POST['nama']);
	$username    =  e($_POST['username']);
	$password_1  =  e($_POST['password']);	

	// form validation: ensure that the form is correctly filled
    if (empty($id_user)) {
        array_push($errors, "ID User is required");
    }
	if (empty($nama)) {
        array_push($errors, "Nama Pegawai is required");
    }
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['level'])) {
			$level = e($_POST['level']);
			$query = "INSERT INTO users (id_user, nama, username, password, level) 
					  VALUES('$id_user', '$nama','$username', '$password', '$level')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: ../user/user.php');
		} else {
			$query = "INSERT INTO users (id_user, nama, username, password, level) 
					  VALUES('$id_user', '$nama','$username', '$password','Admin')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: user.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['level'] == 'Admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');		  

			}else if ($logged_in_user['level'] == 'Operator') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');

			}else if ($logged_in_user['level'] == 'Unit') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');
            }
		}
		else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

// log user out if logout button clicked{
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 'Admin' ) {
		return true;
	}else{
		return false;
	}
}

function isOperator()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 'Operator' ) {
		return true;
	}else{
		return false;
	}
}

function isUnit()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 'Unit' ) {
		return true;
	}else{
		return false;
	}
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
