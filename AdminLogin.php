<?php
    include 'includes/header.php';
?>

</head>

<body>


<?php
include 'config/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     
     $email=$_POST['email'];
     $Pass=$_POST['password'];
    
       $query="select * from admin where `email` ='$email' and `password`='$Pass'";

    
    
     
      $Complete=mysqli_query($db,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['email']==$email &&$Rows['password']==$Pass)
    {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $Pass;
        header("Location:AdminManage.php");
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
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	<center><img class="profile-img" src="Image/admin.png " alt=""></center>
        <?php
            if (isset($message)){
                echo '<p class="text-danger">'. $message.'</p>';
            }
        ?>
        <form action="" method="POST">
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>

<?php include 'includes/footer.php'?>