<?php  session_start() ?>
<?php
    include 'includes/header2.php';
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     $name=$_GET['reply'];
      //echo $name;

      $msg=$_POST['message'];
      $temp="This is Reply From Admin, ";

      $message=$temp.$msg;

     // echo $message;

      $query="insert into Notification values('$name','$message','No')";
      mysqli_query($connection,$query);

         $qry="delete from ANotification where Name='$name'";
            mysqli_query($connection,$qry);
       header('Location:AdminManage.php');


    }
?>


<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
           <legend class="text-center">Admin Panel</legend>

            <div class="form-group">
              <label class="col-md-3 control-label" for="message"> Your Reply</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please Enter Your Reply Here..." rows="5"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12 text-right"><a href="AdminMagane.php"> <img src="Image/back.jpg"  width="50px" height="50px"  alt="Bid" /> </a>
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
</body>
<?php
    include 'includes/footer.php';
?>
