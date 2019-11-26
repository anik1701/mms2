<?php include 'includes/header.php'; ?>


<script type="text/javascript">
	

	function RegisterValid()
	{


    var Name     =Registerform.name;
    var Uname    =Registerform.uname;
    var Password =Registerform.password;
    var email    =Registerform.email;
    var phone    =Registerform.phone;
    var dob      =Registerform.dob;
    var gender   =Registerform.gender;
    var address  =Registerform.address;


    if (Name.value == "")
    {
        window.alert("Please enter your name.");
        Name.focus();
        return false;
    }

    if (!/^[a-zA-Z]*$/g.test(Name.value)) {
        alert("Invalid Characters For Name");
        Name.focus();
        return false;
    }

    if (Uname.value == "")
    {
        window.alert("Please enter your username.");
        Uname.focus();
        return false;
    }
    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }



    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 11)
    {
        window.alert("Please  your telephone number must be 11 digit.");
        phone.focus();
        return false;
    }


    if (dob.value == "")
    {
        window.alert("Please Date of Birth.");
        dob.focus();
        return false;
    }
    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    if (gender.value == "")
    {
        window.alert("Please provide Gender.");
        gender.focus();
        return false;
    }

    return true;
}

 
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>
<?php
include 'config/db.php'; 

if (isset($_POST['submit'])){

         $name     =$_POST['name'];
         $uname    =$_POST['uname'];
         $Password =$_POST['password'];
         $email    =$_POST['email'];
         $phone    =$_POST['phone'];
         $dob      =$_POST['dob'];
         $gender   =$_POST['gender'];
         $address  =$_POST['address'];


         $destination = "UserPhoto/".$_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into User(Name,uname,Password,Email,Phone,Gender,DOB,Address,image) values('$name','$uname','$Password','$email','$phone','$gender','$dob','$address','$destination')";
         $ret= mysqli_query($db,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
      }
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
	
  <form method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
  	</div>
	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" class="form-control" name="uname" id="uname"  placeholder="Enter your User Name"/>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
  	</div>
  	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="text" class="form-control" name="phone"  placeholder="Enter your Phone Number"/>
  	</div>
  	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" class="form-control" name="dob"/>
	  <div class="input-group">
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" class="form-control" name="address" placeholder="Your Address" />
  	</div>
	
  	<div class="form-group">
			<label>Your Gender</label>
			<div class="input-group">					
				<input type="radio" name="gender" value="Male" />Male
				<input type="radio" name="gender" value="Female" />Female
			</div>
		</div>
		
		<div class="input-group">
			<label>Your Profile Picture</label>				
				<input type="file" name="image">
			</div>
	</div>

		<div class="form-group ">
		<input  type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">
		</div>
  	
  </form>
  <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
<?php
    include 'includes/footer.php';
?>