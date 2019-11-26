<?php session_start() ?>
<?php
    include 'includes/header2.php';
?>
<br>
<br>
</head>
<body>
<div id="a">
<form action="" method="POST">
<table style="width: 80%;" class="table">
 <thead>
     <tr>
       <th>Photo</th>
       <th>Item No</th>
       <th>Item Name</th>
       <th>Item Type</th>
       <th>Details</th>
       <th>Quantity</th>
    </tr>
  </thead>

<tbody>

<?php

   include 'config/db.php';
    $query="select * from Stock";
    $Result=mysqli_query($db,$query);
   while ($row=mysqli_fetch_array($Result))
    {
          echo "<tr>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='".$row['image']."'>";
          echo "</td>";
          echo "<td>";
          echo $row['no'];
          echo "</td>";
          echo "<td>";
          echo $row['type'];
          echo "</td>";
          echo "<td>";
          echo $row['name'];
          echo "</td>";
          echo "<td>";
          echo $row['details'];
          echo "</td>";
          echo "<td>";
          echo $row['quantity'];
          echo "</td>";
          echo "<td>";
         ?>
<?php

echo'</td>';

    }
?>

</tbody>
</table>
</form>
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
