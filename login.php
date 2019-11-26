<?php
    include 'includes/header.php';
?>
 
<script type="text/javascript">
  
  function ValidUser()
  {
    var name=UserLogin.uname;
    var Password=UserLogin.Password;

    if(name.value=="")
    {
      window.alert("Name Field Can Not Be Empty");
      name.focus();
      return false;
    }
    if(Password.value=="")
    {
      window.alert("Password Field Can Not Be Empty");
      Password.focus();
      return false;
    }
    return true;
  }


</script>
</head>

<body>


<?php
include 'config/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     
     $uname=$_POST['uname'];
     $Pass=$_POST['password'];
    
       $query="select * from user where `uname` ='$uname' and `password`='$Pass'";

    
    
     
      $Complete=mysqli_query($db,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['uname']==$uname &&$Rows['password']==$Pass)
    {
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['password'] = $Pass;
        header("Location:customer.php");
         exit();
     
    }
    else
    {
      
      echo "<script>window.alert('Wrong User Name Or Password Try Again');</script>";
    }
    
      mysqli_close($db);                     
   }

	

?>

<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	<center><img class="profile-img" src="Image/user.png " alt=""></center>
                <form class="form-signin" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="uname" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="Registration.php">Sign up</a>
  	</p>
  </form>
</body>
</html>

<?php include 'includes/footer.php'?>