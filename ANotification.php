<?php session_start() ?>

<?php
    include 'includes/header2.php';
?>


  <style>

 body {
font-family: Agency FB;
}


    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }

    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th,
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #2F4F4F;
      color: #FFFFFF;
      border-color:black !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: #008080;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #2F4F4F;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }




</style>

<script type="text/javascript">

function reply(name)
{
  if(confirm('Sure To Reply?'))
  {


    window.location='ANotificationReply.php?reply='+name
  }
}

function del(email)
{
  if(confirm('Sure Delete?'))
  {


    window.location='ANotificationDelete.php?del='+email
  }
}
</script>

</head>
<body>
  <form action="" method="POST">



<?php

    $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

    $query="select * from ANotification";
    $Result=mysqli_query($connection,$query);
    if(mysqli_num_rows($Result)>0){
   $not=mysqli_num_rows($Result);
echo "<script> alert('Your Have $not New Notification'); </script>";
     echo'<table class="data-table">
 <thead>
     <tr>

       <th>Name</th>
       <th>Email</th>
       <th>Message</th>
       <th>Reply</th>
       <th>Delete</th>

    </tr>
  </thead>

<tbody>';

   while ($row=mysqli_fetch_array($Result))
    {
          echo "<tr>";

          echo "<td>";
          echo $row['Name'];
          echo "</td>";
          echo "<td>";
          echo $row['Email'];
          echo "</td>";
          echo "<td>";
          echo $row['Message'];
          echo "</td>";
            echo "<td>";
            $email=$row[1];
            $name=$row[0];
         echo"<a href=javascript:reply('$name')> <img src='Image/reply.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";

           echo "<td>";
            $email=$row[1];
         echo"<a href=javascript:del('$email')> <img src='Image/Delete.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";


    }
  }
  else
  {
    echo "<script> alert('Your Have Not Any Notification'); </script>";
  }
?>

</tbody>
</table>
</form>
</body>

    <div class="hero-wrap" style="background-image: url('Image/download.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 text ftco-animate mt-5 text-center" data-scrollax=" properties: { translateY: '70%' }">
          		<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Take A Tour To The World of History</h1>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php';?>
