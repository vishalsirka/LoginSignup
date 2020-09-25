<?php
namespace vishalcode;
use \vishalcode\Member;

   

// ----------------For Login System-------------//

if(!empty($_POST["submit"]))
{

	 session_start();

	 $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	 $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	 $password = md5($password);

    require_once 'Member.php';
    $member = new Member();   
	 
	 $isLoggedIn = $member->processlogin($email, $password);

	  if(!$isLoggedIn){
	 	$_SESSION['errorMessage'] = "Invalid Credentials";

	 	 header('location:login.php');

	 }else{ 

	   header('location:dashboard.php');

	 } 


}







?>