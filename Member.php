<?php
namespace vishalcode;
use \vishalcode\DatabaseConnect;


class Member{

 private $ds;


 function __construct(){

 	 require_once('Datasource.php');
 	 $this->ds = new DatabaseConnect();
 }
    
   
//----------To Check Whether user is  in database or not. and also store user id into session ------//
 function processlogin($email, $password)
 {

 	$query = "SELECT * FROM users WHERE email = ? AND password = ?";
 	$memberResult = $this->ds->select($query, $email, $password);
  
     if(!empty($memberResult))
     {
     	 $_SESSION['userId'] = json_encode($memberResult['id']);   
     	 return true;
     }
 	
 }

 function getMemberById($memberId)
 {
 	$query = "SELECT * FROM users WHERE id = ?";
 	$memberResult = $this->ds->getData($query, $memberId);
 	return $memberResult;
 } 

 function isMemberExists($email, $mobile)
 {
 	  $query = "SELECT * FROM users WHERE  email=? OR mobile = ?";
 	  $memberCount = $this->ds->numRows($query, $email, $mobile);

 	  
 }

public function insertMemberRecord($username,$firstname, $lastname, $email, $mobile, $password, $filename)
   {
     
     $query = "INSERT INTO users (username, firstname, lastname, email, mobile, password, picture) VALUES (?,?,?,?,?,?,?)";
     
     $result = $this->ds->insert($query, $username, $firstname, $lastname, $email, $mobile, $password, $filename);

     return $result;



}
}






?>