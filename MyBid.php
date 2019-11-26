<?php 
if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    session_start();
}
 include 'config/db.php';
    include 'includes/header1.php';
?>
<?php

 
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 


      $username=$_SESSION['username'];

       $query="select * from Product where Buyer='$username' and ProductStatus='Yes'";
       $Rows=mysqli_query($connection,$query);

     if(mysqli_num_rows($Rows)>0){
      echo '<table class="data-table">';
       echo'<thead>';
       echo'<tr>';
        echo'<th>Product Name</th>';
       echo'<th>Catagory</th>';    
       echo'<th>SellerName</th>'; 
       echo '<th>Sold Price</th>';
      
      echo'</tr>';
      echo'</thead>';

      echo'<tbody>';

   while($row = mysqli_fetch_array($Rows))
      {
     
        echo '<tr>
           <td>'.$row['ProductName'].'</td>
            <td>'.$row['CatagoryName'].'</td>
             <td>'.$row['UserName'].'</td>
             <td>'.$row['Price'].'</td>
        </tr>';
      }
  }
  else
   {
    echo "<script> window.alert('You Are Not Participate Any Bid Yet');</script>";
   }
   
?>


<?php include 'includes/footer.php'; ?>

