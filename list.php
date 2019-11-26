<?php
include 'includes/header.php';
include 'includes/sidebar.php';

    $sql = "SELECT * FROM admin";
    $row = $db->query($sql);
?>

    <div class="row content">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            
                            <th style="width: 10px">Action</th>
                        </tr>
                        <?php
                            while ($data = $row->fetch_assoc()){
                        ?>
                             <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['address'] ?></td>
                            <td><?= $data['phone'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><span class="badge bg-red"></span></td>
                            <td>
                                <a href="edit.php?edit=<?= $data['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="delete.php?del=<?= $data['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
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
