<?php session_start() ?>
<?php
    include 'includes/header2.php';
?>

<script type="text/javascript">

function validadmin()
{
 


var uname=AAdmin.username;

var password=AAdmin.password;
var email=AAdmin.email;


if(uname.value=="")
{
  window.alert("Need Valid Username for new admin");
  uname.focus();
  return false;

}

if(email.value=="")
{
  window.alert("Need Valid Email for new admin");
  email.focus();
  return false;
  
}

if(password.value=="")
{
  window.alert("Need password for new admin");
  password.focus();
  return false;
  
}

   if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
return true;

}
</script>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

        
          $uname    =$_POST['username'];
          $email    =$_POST['email'];
		  $Password =$_POST['password'];

          $query="insert into admin(AdminName,AdminEmail,AdminPassword) values('$uname','$email','$Password')";
          mysqli_query($connection,$query);
      
          echo '<script language="javascript">';
          echo 'alert("Added successfully")';
          echo '</script>';     
}

?>

<div class="container-fluid">
   <form  class="register-form" method="POST" name="AAdmin"> 
      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="Username">ADMINNAME</label>
               <input type="text" name="username" class="form-control">    
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">EMAIL</label>
               <input type="email" name="email" class="form-control">             
           </div>  
		   
      </div>
	   <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD</label>
               <input type="password" name="password" class="form-control" >             
           </div>            
      </div>
     
      <hr>
      <div class="row">
        
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
              <input  type="submit" class="btn btn-default regbutton" onclick=" return validadmin();" >
            </div>   
      </div>    
    </form>
</div>
</body>
<?php
    include 'includes/footer.php';
?>
