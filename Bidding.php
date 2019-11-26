
<?php 
  session_start();
 include 'Connection/DatabaseConnection.php';
    include 'includes/header1.php';
?>

 body {
   
font-family: Agency FB;
}




</style>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate ?'))
  {
    window.location='UserBid.php?bid='+id
  }
}
</script>



<?php
   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
$username=$_SESSION['username'];
  $query="select * from product where ProductStatus='No' and UserName!='$username'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    while ($row=mysqli_fetch_array($Result)) {

      if($break==2){

        echo "<tr>";
        
    
        $break=0;

      }
    $datenow = date("Y-m-d");
        
  $sdate = $row['StartDate'];
  if($sdate<=$datenow){
    echo'<td>';
     echo"<img src='".$row['Image']."' width='200px' height='220px'>";
    echo'</td>';
    echo'<td>';
    echo "<h1> Description</h1>";
    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
      echo "Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";
    ?>
    <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Images/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
<?php 
      $break++;
echo'</td>';
    }
  }
?>

  
</table>

</div>


 </div>
   
    <div class="hero-wrap" style="background-image: url('images/download.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 text ftco-animate mt-5 text-center" data-scrollax=" properties: { translateY: '70%' }">
          		<h6 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            </div>
		</div>
	</div>
<?php include 'includes/footer.php'; ?>
