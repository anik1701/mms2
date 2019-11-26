
<?php
include 'config/db.php';
include 'includes/header2.php'; 

if (isset($_POST['submit'])){

          $catagory     =$_POST['catagory'];
         $name     =$_POST['name'];
         $fname =$_POST['fname'];
         $details    =$_POST['details'];
         $quantity    =$_POST['quantity'];

         $destination = "UserPhoto/".$_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into stock (catagory,name,fname,details,quantity,image) values('$catagory','$name','$fname','$details','$quantity','$destination')";
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
      <label>Catagory</label>
      <input type="text" class="form-control" name="catagory" id="name"  placeholder="Enter your Name"/>
    </div>

  <div class="input-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
    </div>
  <div class="input-group">
      <label>fname</label>
      <input type="text" class="form-control" name="fname" id=""  placeholder="Enter your User Name"/>
    </div>
    <div class="input-group">
      <label>Details</label>
      <input type="text" class="form-control" name="details" id=""  placeholder="Enter your Password"/>
    </div>
    <div class="input-group">
      <label>Quantity</label>
      <input type="text" class="form-control" name="quantity" id="email"  placeholder="Enter your Email"/>
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

          </div>
        </div>
      </div>
    </div>

</body>
</html>
<?php
    include 'includes/footer.php';
?>