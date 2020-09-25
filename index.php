<?php
session_start();
if(isset($_SESSION['userId'])){
   header('location:dashboard.php');
}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <style>

.error_form{   
     color:red;
	 }
 </style>
</head>
<body>
	<div class="container">
		<div class="col-sm-4   shadow-lg p-4 mb-4 bg-white" style="margin:auto; margin-top:20px;">
			<h1> Login Form</h1>
       <?php             
              if(isset($_SESSION["errorMessage"])){
        ?>
             <center><div class="error-message text-danger"><?php echo $_SESSION['errorMessage']; ?></div></center>
               <?php
               unset($_SESSION['errorMessage']);
              } ?>     
              
          <form   action="login-action.php" id="adduser" method="post"> 
           	  <div class="form-group">                
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" required>
                <span class="error_form" id="error_email"></span>
           	  </div>
       	  
           	   <div class="form-group">
           	   	   <label for="password">Password</label>
           	   	   <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
           	   	   <span class="error_form" id="error_password"></span>
           	   </div>

           	   <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">
                    Do you have account?<a href="signup.php">Signup</a>

           </form>

         </div>
    

</div>


</body>
</html>