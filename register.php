<?php
    include 'includes/header.php';
	 include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div class="hero-wrap" style="background-image: url('images/download.jpg');" data-stellar-background-ratio="0.5">
    
  <div class="header">
  	<h2>Customer Registration</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	
	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form></h1>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
<?php
    include 'includes/footer.php';
?>
