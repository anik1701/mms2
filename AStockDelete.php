<?php
if(isset($_GET['bid']))
{
$id=$_GET['bid'];


include 'config/db.php';

   $query="delete from Stock where id='$id'";



    mysqli_query($db,$query);
    header('Location:AStockView.php');
}
?>