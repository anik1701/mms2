<?php
include 'includes/header.php';
include 'includes/sidebar.php';

    $sql = "SELECT * FROM categories";
    $row = $db->query($sql);
?>

    <div class="row content">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            
                            
                            <th style="width: 10px">Action</th>
                        </tr>
                        <?php
                            while ($data = $row->fetch_assoc()){
                        ?>
                             <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['description'] ?></td>
                            
                            <td><span class="badge bg-red"></span></td>
                            <td>
                                <a href="category-edit.php?edit=<?= $data['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="category-delete.php?del=<?= $data['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
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
