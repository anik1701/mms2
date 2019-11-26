<?php 
if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    session_start();
}
    include 'includes/header1.php';

?>
  <br>
   <br>
    <br>
<?php
include 'config/db.php';
if (isset($_post["submit"])) 
{
     
      $username=$_SESSION['username'];


      $query="delete from anotification where username='$username'";

       mysqli_query($db,$query);
 
}

?>
<center>
<?php

       $username=$_SESSION['uname'];
       $count=0;
       $query="select * from Notification where username='$username' and Seen='No'";
       var_dump($query);
       $Rows=mysqli_query($db,$query);
       $count= mysqli_num_rows($Rows);



     

      if($count==0)
      {
        echo "<br><br>";
        echo "<h1 style='font-size:30px;color:green'>";
        echo "You Have Not Any New Notification Now";
        echo "</h1>";
      
      }

     if($count>0)
      {

       echo "<script> alert('You Have $count New Notification');</script>";
   
      echo "<form method='POST'>";
        echo'<table  style="width:200px;height:500px;border:2px solid black" class="data-table">
     <thead>
     <tr>
           
      
       
       <th>Message</th>   
      
      
    </tr>
  </thead>

<tbody>';

   while ($row=mysqli_fetch_array($Rows))
    {
          echo "<tr>";
          

          echo "<td>";
          echo $row['Message'];
          echo "</td>";

         /*  echo "<td>";
            $uname=$row[0];
         echo"<a href=javascript:del('$uname')> <img src='Image/Delete2.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";*/

    
    }

echo"<p style=' margin: 1% 0% 0% 45%'>
<button type='submit' class='btn btn-primary' >Delete All Message</button>
</p>";

    echo "</form>";
    echo "</tbody>";
      }
     

 
?>
	
 <br>
  <br>
   <br>
    <br>
<?php include 'includes/footer.php'; ?>

