<?php
include 'config/db.php'; 

if (isset($_POST['submit'])){

         $catagory =$_POST['catagory'];
         $name     =$_POST['name'];
         $fname    =$_POST['fname'];
         $details  =$_POST['details'];
         $quantity =$_POST['quantity'];

         $destination = "Image/".$_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into Stock(catagory,name,fname,details,quantity,image) values('$catagory','$name','$fname','$details','$quantity','$destination')";

         $ret= mysqli_query($db,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
      }
?>    
<!DOCTYPE html>
<html>
<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Add A New Item</h2>
  </div>
  
  <form action="" method="POST">
  <div class="form-group">
              <label class="control-label" for="signupName">Product Catagory</label>
              <select name="catagory" id="catagory" onchange="fetch_select(this.value);">
                <option>Select Catagory</option>
                <option>Antique</option>
                <option>painting</option>
                <option>Other</option>
              </select>
            </div>
  <div class="input-group">
      <label>Item Name</label>
      <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Item Name"/>
    </div>
    <div class="input-group">
      <label>Founder Name</label>
      <input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter Founder Name"/>
    </div>
    <div class="input-group">
      <label>Item Details</label>
      <input type="text" class="form-control" name="details" id="details"  placeholder="Enter Details"/>
    </div>
    <div class="input-group">
      <label>Item Quantity</label>
      <input type="text" class="form-control" name="quantity"  placeholder="Enter Quantity"/>
    </div>
  
    <div class="input-group">
      <label>Your Item Picture</label>       
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