<?php
  include 'includes/header.php';
  include 'includes/sidebar.php';

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $confirm_password = ($_POST['confirm_password']);
        $status = $_POST['status'];
       if(!empty($name) && !empty($email) && !empty($address) && !empty($phone) && !empty($password) && !empty($confirm_password) && !empty($status))
       {
             
            if ($password == $confirm_password)
            {
               
                    $result="SELECT `email` FROM users WHERE `email` ='$email'";
                    $count=$db->query($result);
                        if($count->num_rows  > 0)
                        {
                            $msg="Sorry Email <font color=white> $_POST[email]</font> Already Taken";
                        }else
                            {
                            $sql = "INSERT INTO users (`name`,`address`,`phone`, `email`, `password`, `status`)VALUES('$name','$address','$phone', '$email', '$password', '$status')";
                                if ($db->query($sql)){
                                    $msg = "Data Inserted successfully !";
                                }
                                else
                                {
                                    $msg = "Something went wrong!";
                                }
                            }
//                echo $sql;die();
                
            }
            else
            {
                $msg = "Password doesn't match !";
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
                    <h3 class="box-title">Create Admin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="address" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                           

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                        </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include 'includes/footer.php'; ?>
