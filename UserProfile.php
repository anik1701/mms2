<?php
if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    session_start();
}
    include 'includes/header1.php';
?>
<br><br><br>

<?php
include 'config/db.php';

    $uname= $_SESSION['uname'];
     $query="select * from user where uname='$uname'";
      $Result=mysqli_query($db,$query);

        $row = mysqli_fetch_array($Result);

        echo "<div align='center'>";
          echo "<img style='margin:2% auto auto 2%;float:center;border:3px solid black;border-radius:20px;width:250px;height:220px' src='".$row['image']."'>";
         echo "</div>";
              echo "<div align='center'>";
              echo "<h2 style'margin:2% auto auto 40%;float:right;' >";
              echo $row['name'];
              echo "<br>";
              echo $row['email'];
              echo "<br>";
              echo $row['address'];
              echo "<br>";
              echo "</div>";

         echo"</div>";

?>
<?php include 'includes/footer.php'; ?>