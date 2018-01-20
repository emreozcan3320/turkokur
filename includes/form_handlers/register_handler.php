<?php
//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$username = ""; //username
$em = ""; //email
$em2 = ""; //email 2
$city = ""; //city
$gender = ""; //gender
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = array(); //Holds error messages

$user_tur_bir = "";
$user_tur_iki = "";
$user_tur_uc = "";

if(isset($_POST['register_button'])){

	//Registration form values
	$user_tur_bir = $_POST['user_tur_bir'];
	$_SESSION['user_tur_bir'] = $user_tur_bir;

	$user_tur_iki = $_POST['user_tur_iki'];
	$_SESSION['user_tur_iki'] = $user_tur_iki;

	$user_tur_uc = $_POST['user_tur_uc'];
	$_SESSION['user_tur_uc'] = $user_tur_uc;

	//First name
	$fname = strip_tags($_POST['reg_fname']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['reg_fname'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['reg_lname']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['reg_lname'] = $lname; //Stores last name into session variable

	$username = strip_tags($_POST['reg_username']); //Remove html tags
	$username = str_replace(' ', '', $username); //remove spaces
	$username = ucfirst(strtolower($username)); //Uppercase first letter
	$_SESSION['reg_username'] = $username; //Stores username into session variable

	//email
	$em = strip_tags($_POST['reg_email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['reg_email'] = $em; //Stores email into session variable

	//email 2
	$em2 = strip_tags($_POST['reg_email2']); //Remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2)); //Uppercase first letter
	$_SESSION['reg_email2'] = $em2; //Stores email2 into session variable

	$city = strip_tags($_POST['reg_city']); //Remove html tags
	$city = str_replace(' ', '', $city); //remove spaces
	$city = ucfirst(strtolower($city)); //Uppercase first letter
	$_SESSION['reg_city'] = $city; //Stores city into session variable

	//gender
  $gender = $_POST['reg_gender'];
  $_SESSION['reg_gender'] = $gender; //stores gender into session


	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //Remove html tags

	$date = date("Y-m-d"); //Current date

	if($em == $em2) {
		//Check if email is in valid format
		if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($error_array, "Invalid email format<br>");
		}else{

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}
		}
		}

	else {
		array_push($error_array, "Emails don't match<br>");
	}

	if(strlen($username)>25 || strlen($username)<2){
		array_push($error_array, "Your username must be between 2 and 25 characters<br>");
	}
	else{
		//check if Username already exists
		$e_check = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

		//Count the number of rows returned
		$num_rows = mysqli_num_rows($e_check);

		if($num_rows > 0) {
			array_push($error_array, "Username already in use<br>");
		}
	}

	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password) > 30 || strlen($password) < 5) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name

		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");




		//Profile picture assignment
		$rand = rand(1, 16); //Random number between 1 and 2
		if($rand ==1){
			$profile_pic = "assets/images/profile_pics/defaults/head_alizarin.png";}
		else if($rand == 2){
			$profile_pic = "assets/images/profile_pics/defaults/head_amethyst.png";}
		else if($rand == 3){
			$profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";}
		else if($rand == 4){
			$profile_pic = "assets/images/profile_pics/defaults/head_carrot.png";}
		else if($rand == 5){
			$profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";}
		else if($rand == 6){
			$profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";}
		else if($rand == 7){
			$profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png";}
		else if($rand == 8){
			$profile_pic = "assets/images/profile_pics/defaults/head_nephritis.png";}
		else if($rand == 9){
			$profile_pic = "assets/images/profile_pics/defaults/head_pete_river.png";}
		else if($rand == 10){
			$profile_pic = "assets/images/profile_pics/defaults/head_pomegranate.png";}
		else if($rand == 11){
			$profile_pic = "assets/images/profile_pics/defaults/head_pumpkin.png";}
		else if($rand == 12){
			$profile_pic = "assets/images/profile_pics/defaults/head_red.png";}
		else if($rand == 13){
			$profile_pic = "assets/images/profile_pics/defaults/head_sun_flower.png";}
		else if($rand == 14){
			$profile_pic = "assets/images/profile_pics/defaults/head_turqoise.png";}
		else if($rand == 15){
			$profile_pic = "assets/images/profile_pics/defaults/head_wet_asphalt.png";}
		else if($rand == 16){
			$profile_pic = "assets/images/profile_pics/defaults/head_wisteria.png";}



		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
		if (!mysqli_query($con, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '$city', '$gender', 'no', ',' , '0', '0','$user_tur_bir' ,'$user_tur_iki' ,'$user_tur_uc')"))
    {
      echo("Hata: " . mysqli_error($con));
    }

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

		//Clear session variables
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_username'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
		$_SESSION['reg_city'] = "";
    $_SESSION['reg_gender'] = "";
		$_SESSION['user_tur_bir'] = "";
	$_SESSION['user_tur_iki'] = "";
	$_SESSION['user_tur_uc'] = "";
	}

}
?>
