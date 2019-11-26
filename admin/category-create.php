<?php
include 'includes/header.php';
include 'includes/sidebar.php';

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
       if(!empty($name))
       {
               
                    $result="SELECT `name` FROM categories WHERE `name` ='$name'";
                    $count=$db->query($result);
                        if($count->num_rows  > 0)
                        {
                            $msg="Sorry name <font color=white> $_POST[name]</font> Already Taken";
                        }else
                            {
                            $sql = "INSERT INTO categories (`name`,`description`)VALUES('$name','$description')";
                                if ($db->query($sql)){
                                    $msg = "Data Inserted successfully !";
                                }
                                else
                                {
                                    $msg = "Something went wrong!";
                                }
                            }
        }
    }
?>

<div class="row content">
    <?php if (isset($msg)){ ?>
        <div class="alert alert-success">
            <strong>Info: </strong> <?= $msg ?>
        </div>
    <?php } ?>

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Category</h3>
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
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" name="description" rows="8" placeholder="Description"></textarea>
                    </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>
