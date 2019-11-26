<?php session_start() ?>
<?php
    include 'includes/header2.php';
?>
<br>
<br>
</head>
<body>
<div id="a">
<table class="table text-center">
 <thead>
     <tr>
       <th>Photo</th>
       <th>Name</th>
       <th>Catagory Name</th>
       <th>Price</th>
       <th>Sold or Not</th>
       <th>Start Date</th>
       <th>End Date</th>
    </tr>
  </thead>

<tbody>

<?php

   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "mms";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

    $query="select * from Product";
    $Result=mysqli_query($connection,$query);
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

<?php

echo'</td>';

    }
?>

</tbody>
</table>
</div><br>
 <center><button ><a href="#" id="print" onclick="javascript:printlayer('a')">Print </a></button></center>

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
