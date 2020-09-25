<?php
namespace vishalcode;

class DatabaseConnect{ 
   const HOST = 'localhost';
	const USERNAME = 'root';
	const PASSWORD = '';
	const DATABASENAME = 'mysqliprepared';
	private $conn;


	function __construct()
	{
		 $this->conn = $this->getConnection();

	}     

	public function getConnection()
	{
		 $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

		 if(mysqli_connect_errno()){
		 	 trigger_error("Problem with connecting to database.");
		 }
		 $conn->set_charset("utf8");
		 return $conn;
	}

	public function select($query,  $email, $password)
	{
		 $stmt = $this->conn->prepare($query);
         $stmt->bind_param("ss",$email, $password);
         $stmt->execute();
         $result = $stmt->get_result();

         if($result->num_rows>0)
         {   $resultset = array();
         	 while($rows = $result->fetch_assoc())
         	 {
         	 	  $resultset = $rows;
         	 }
         	 if(!empty($resultset))
         	 {
         	 	 return $resultset;
         	 }
         }

	}

	public function getData($query, $memberId)
	{
		  $stmt = $this->conn->prepare($query);
		  $stmt->bind_param("i", $memberId);
		  $stmt->execute();
		  $result = $stmt->get_result();
		  if($result->num_rows>0)
		  {
		  	    $resultset = array();
		  	     while($rows = $result->fetch_assoc())
		  	     {
		  	     	  $resultset = $rows;
		  	     }
		  	      if(!empty($resultset))
		  	      {
		  	      	 return $resultset;
		  	      }
		  }
	}

	public function numRows($query , $email, $mobile)
	{
		 $stmt = $this->conn->prepare($query);
		 $stmt->bind_param("ss", $email, $mobile);
		 $stmt->execute();
		 $stmt->store_result(); 
		 $recordCount = $stmt->num_rows;
         return $recordCount;
	}

	public function insert($query, $username, $firstname, $lastname, $email, $mobile,$password, $filename)
	{

	  $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sssssss",  $username, $firstname, $lastname, $email, $mobile, $password, $filename);
      $stmt->execute();
      $result = $this->conn->insert_id;
	  if(!empty($result))
	  {
	  return "Successfully Registered";
	  }else {
	  return "Not Registered";
	  }
	  $stmt->close();
	  }
	




}



?>