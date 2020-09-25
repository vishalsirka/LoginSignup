<?php
session_start();
if(isset($_SESSION['userId']))
{
   header('location:dashboard.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>

	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
 <style>
   
.error{
     color:red;
	 }

  

#profileDisplay{
  display:block;
  width:40%;
  margin: 20px auto;
  border-radius: 50%;
}
 </style>
       
</head>
<body>

	<div class="container">
		<div class="col-sm-4   shadow-lg p-4 mb-4 bg-white" style="margin:auto; margin-top:20px;">

			<h1> Signup Form</h1>
       <?php             
              if(isset($_SESSION["errorMessage"])){
               ?>
               <center><div class="error-message text-danger"><?php echo $_SESSION['errorMessage']; ?></div></center>
               <?php
               unset($_SESSION['errorMessage']);
              }         
          ?>

         <form  action="signup-action.php" id="adduser" method="post"  enctype="multipart/form-data">
                  
                    <img style="width:100px;" class="image-circle"/><br>

                <div class="form-group">
                     <img src="images/user1.png" onclick="triggerClick()" id="profileDisplay" />
                    <center> <label class="badge badge-success">Upload image</label></center>
                     <input type="file" name="picture" onchange="displayImage(this)" id="picture" style="display:none" value="picture" class="form-control">
                </div>
           
               	<div class="form-group">     
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                    <span class="error_form" id="error_username"></span>
                 </div>

             	  <div class="form-group">
             	  	 <label for="firstname">Firstname</label>
             	  	 <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Firstname" autocomplete="off" required>
             	  	 <span class="error_form" id="error_firstname"></span>
             	  </div>

             	  <div class="form-group">
             	  	  <label for="lastname">Lastname</label>
             	  	  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Lastname" autocomplete="off" required>
             	  	  <span class="error_form" id="error_lastname"></span>
             	   </div>

             	   <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required>
                     <span class="error_form" id="error_email"></span>
             	   </div>

             	   <div class="form-group">
             	   	  <label for="mobile">Mobile</label>
             	   	  <input type="digit" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile no" autocomplete="off" required>
             	   	  <span class="error_form" id="error_mobile"></span>
             	   </div>

             	   <div class="form-group">
             	   	   <label for="password">Password</label>
             	   	   <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
             	   	   <span class="error_form" id="error_password"></span>
             	   </div>

           	   <div class="form-group">
           	   	   <label for="cpassword">Confirm Password</label>
           	   	   <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
           	   	   <span class="error_form" id="error_cpassword"></span>
           	   </div>

           	   <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">
               I have an account.<a href="login.php">Login </a>

           </form>

         </div>
                  

</div>

<script>
function triggerClick(e){     
  document.querySelector('#picture').click();
}
function displayImage(e){
      if(e.files[0]){
         var reader = new FileReader();
         reader.onload=function(e){
           document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
         }
           reader.readAsDataURL(e.files[0]);
      }
     
   }
</script>



<script>

$.validator.addMethod('password', function(value, element) {
   return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
    },
    'Password must contain at least one numeric and one alphabetic character.');

 $(document).ready(function($) {
        
        $("#adduser").validate({
                rules: {
                  username: "required",

                  firstname: "required",
                  lastname: "required",
                  
                                  
                   email: {
                      required: true,
                      email: true,
                   
                  },
                   mobile:{
                      required: true,
                      minlength:10, 
                      maxlength:10,
                      digits:true
                    
                     
                   },
                   password: {
                        required: true,
                        minlength: 6,
                        mypassword: true
                    },

                  cpassword:{
                      equalTo: "#password"
                  }
                },


                messages: {
                    username: "Please enter your username", 
                    
                    firstname: "Please enter your firstname",

                    lastname: "Please enter your lastname",

                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                  email: {
                      required: "Please enter your email",
                      email: "Please enter in email format"
                  },    
                                
                  mobile: {
                    required: "Please fill the number",
                    digits: "Only Digits allowed",
                    maxlength: "10 Characters are allowed",
                    minlength: "10 Characters are allowed"

                  },

                  cpassword: "Enter Confirm Password Same as Password"
                },
                 errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
                submitHandler: function(form) {
                    form.submit();
                }    
            });

    });

</script>


</body>
</html>