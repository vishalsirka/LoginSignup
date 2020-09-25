<?php 
namespace vishalcode;       
use \vishalcode\Member;
session_start();
  
if(!empty($_SESSION["userId"]))
{
	 require_once 'Member.php';
	$member = new Member();
	$memberResult = $member->getMemberById($_SESSION['userId']);
	if(!empty($memberResult['username']))
	{
		$username = ucwords($memberResult['username']);
		$firstname = ucwords($memberResult['firstname']);
		$lastname = ucwords($memberResult['lastname']);
		$email = $memberResult['email'];
		$mobile = $memberResult['mobile'];
		$picture = $memberResult['picture'];
	}
}else
    {
        header('location:login.php');
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php  echo $firstname;  echo "&nbsp;" .$lastname; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>

		
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="#"> Dashboard</a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul class="navbar-nav ml-auto">
			      
			     <li class="nav-item dropdown">
				      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				        <?php  echo $username; ?>
				      </a>
				      <div class="dropdown-menu">
				        <a class="dropdown-item" href="logout.php">Logout</a>
				      </div>
				    </li>
			    </ul>
			  </div>
			</nav>

	  
      
	<div class="container">
	
     <div class="card" style="width:400px; margin:0 auto;">
     <center><h3 class="text-primary">Profile</h3></center>
    <img class="card-img-top" src="upload/<?php echo $picture;?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title text-danger"><?php echo $firstname; echo '&nbsp;' .$lastname; ?></h4>
      <p class="card-text"><strong>Username: </strong><?php echo $username; ?></p>
      <p class="card-text"><strong>Email: </strong> <?php echo $email; ?></p>
      <p class="card-text"><strong>Mobile: </strong><?php echo $mobile; ?></p>
      
    </div>
  </div>
             
		
	</div>
	
</body>
</html>