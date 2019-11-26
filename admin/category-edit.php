<?php
    include '../config/db.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';

    if (isset($_GET['edit'])){
        $id =  $_GET['edit'];

        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $row = $db->query($sql);
        $data = $row->fetch_assoc();
    }

    if (isset($_POST['update'])){
       
        $name = $_POST['name'];
        $description = $_POST['description'];
       

        if (!empty($name)){
            $sql = "UPDATE categories SET `name` = '$name', `description` = '$description' WHERE `id` = '$id'";
            if($db->query($sql)){
               // echo '<script>'."alert('Update Successfully')".'</script>';

               //header('Location:list.php');
            }else{
                echo "Something went wrong!!";
            }
        }
    }
?>
    <div class="row content">
    <?php if (isset($msg)){ ?>
        <div class="alert alert-success">
            <strong>Info: </strong> <?= $msg ?>. !
        </div>
    <?php } ?>

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" value="<?= $data['name']?>" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" type="text" name="description" rows="8" placeholder="Description"><?= $data['description']?></textarea>
                    </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



   

<?php include 'includes/footer.php'; ?>

