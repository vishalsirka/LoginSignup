<?php
namespace vishalcode;
use \vishalcode\Member;


if(!empty($_POST['submit']))
{                                       
   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
   $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
   $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   $password = md5($password);

    $targetDir = "upload/";
    $filename = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $filename;
      move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath);

   
   session_start();
   
   require_once('Member.php');
   $member = new Member();
   
    $memberCount = $member->isMemberExists($username, $email);

    if($memberCount == 0)   
	 	   {
	 	   	 $insertId = $member->insertMemberRecord($username, $firstname, $lastname, $email, $mobile, $password, $filename);
         $_SESSION['errorMessage'] = $insertId;
         header('location:login.php');	 
	 	   	} else{
                               
	 	   		return  $memberCount;
	 	   	}
   


}
