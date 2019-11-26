<?php
include 'includes/header.php';
include 'includes/sidebar.php';

    $sql = "SELECT * FROM products";
    $row = $db->query($sql);
?>

    <div class="row content">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Products List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Product Name</th>
                            <th>Category ID</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Starting Price</th>
                            <th>Starting Time</th>
                            <th>Ending Time</th>
                    
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($data = $row->fetch_assoc()){
                        ?>
                             <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['product_name'] ?></td>
                            <td><?= $data['category_id'] ?></td>
                            <td><?= $data['description'] ?></td>
                            <td><?= $data['images'] ?></td>
                            <td><?= $data['starting_price'] ?></td>
                            <td><?= $data['starting_time'] ?></td>
                            <td><?= $data['ending_time'] ?></td>
                           
                            <td><span class="badge bg-red"></span></td>
                            <td class="text-center">
                                <a href="product-edit.php?edit=<?= $data['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="product-delete.php?del=<?= $data['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

<?php include 'includes/footer.php'?>
