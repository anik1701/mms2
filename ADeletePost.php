<?php session_start() ?>
<?php
    include 'includes/header2.php';
?>
<br>
<br>
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
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
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
      background-color: lightgray;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
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

function bid(id)
{
  if(confirm('Are You Sure Delete This Post?'))
  {
    alert(id);

    window.location='APostDelete.php?bid='+id
  }
}
</script>

</head>
<body>
<div id="a">
<form action="" method="POST">
<table class="data-table">
 <thead>
     <tr>
       <th>Photo</th>
       <th>Name</th>
       <th>Catagory Name</th>
       <th>Price</th>
       <th>Sold or Not</th>
       <th>Start Date</th>
       <th>End Date</th>
       <th>Delete</th>
    </tr>
  </thead>

<tbody>

<?php
include 'config/db.php';
    $query="select * from Product";
    $Result=mysqli_query($db,$query);
   while ($row=mysqli_fetch_array($Result))
    {
          echo "<tr>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='".$row['Image']."'>";
          echo "</td>";
          echo "<td>";
          echo $row['ProductName'];
          echo "</td>";
          echo "<td>";
          echo $row['CatagoryName'];
          echo "</td>";
          echo "<td>";
          echo $row['Price'];
          echo "</td>";
          echo "<td>";
          echo $row['ProductStatus'];
          echo "</td>";
          echo "<td>";
          echo $row['StartDate'];
          echo "</td>";
          echo "<td>";
          echo $row['EndDate'];
          echo "</td>";
          echo "<td>";
         ?>
   <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/delete1.jpg"  width="50px" height="50px"  alt="Bid" /> </a>
<?php

echo'</td>';

    }
?>

</tbody>
</table>
</form>
</div><br>
 <center><button ><a href="pdf.php" >Print </a></button></center>

   <script type = "text/javascript">
    function printlayer(layer)
    {

        var generator = window.open("", "", "width=800,height=1400");
        var layetext = document.getElementById(layer);
        generator.document.write(layetext.innerHTML.replace("Print Me"));

        generator.document.close();
        generator.print();
        generator.close();

    }
</script>
</body>
<?php
    include 'includes/footer.php';
?>
