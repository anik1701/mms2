<?php
    include 'config/db.php';
    include 'includes/header1.php';

    if (isset($_GET[''])){
        $id =  $_GET[''];

        $sql = "SELECT * FROM user WHERE id = '$id'";
        $row = $db->query($sql);
        $data = $row->fetch_assoc();


    }

  if (isset($_POST['update'])){
       
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        //$dob = $_POST['dob'];
        //$salary = $_POST['salary'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        
        if (!empty($name) && !empty($address) && !empty($phone) && !empty($email) && $status != null){
            $sql = "UPDATE user SET `name` = '$name', `uname` = '$uname', `password` = '$password', `email` = '$email', `phone` = '$phone',  `address` = '$address', `status` = '$status' WHERE `id` = '$id'";
            if($db->query($sql)){
               // echo '<script>'."alert('Update Successfully')".'</script>';
            $msg = "Updated Successfully!";
              
            }else{
                echo "Something went wrong!!";
            }
        }
    }
?>

     <div class="row content">
        <?php if (isset($msg)){ ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?= $msg    ?>.
            </div>
        <?php } ?>

        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" value="<?= $data['name']?>" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>

                        <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" value="<?= $data['uname']?>" name="uname" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                        </div>

                        <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" value="<?= $data['password']?>" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="<?= $data['email']?>" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="phone" value="<?= $data['phone']?>" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="address" value="<?= $data['address']?>" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="status" class="form-control">
                                <?php if ($data['status'] == 0){ ?>
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Inactive</option>
                                <?php } ?>

                                <?php if ($data['status'] == 1){ ?>
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                <?php } ?>
                            </select>
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
