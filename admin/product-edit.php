<?php
    include '../config/db.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';


    if (isset($_GET['edit'])){
        $id =  $_GET['edit'];

        $sql = "SELECT * FROM products WHERE id = '$id'";
        $row = $db->query($sql);
        $data = $row->fetch_assoc();
    }

    if (isset($_POST['update'])){
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
         $description = $_POST['images'];
        $starting_price = $_POST['starting_price'];
        $starting_time = $_POST['starting_time'];
        $ending_time = $_POST['ending_time'];
        

        if (!empty($product_name) && !empty($category_id) && !empty($description) && !empty($images) && !empty($starting_price) && !empty($starting_time) && !empty($ending_time)){
            $sql = "UPDATE products SET `product_name` = '$product_name', `category_id` = '$category_id', `description` = '$description', `images` = '$images', `starting_price` = '$starting_price', `starting_time` = '$starting_time', `ending_time` = '$ending_time' WHERE `id` = '$id'";
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
        <?php if (isset($message)){ ?>
            <div class="alert alert-success">
                <strong>Info:!</strong> <?= $message    ?>.
            </div>
        <?php } ?>

        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" value="<?= $data['product_name'] ?>" name="product_name" class="form-control" id="product_name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="category" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php


                                    while ($datas = $row->fetch_assoc()){
                                ?>
                                    <option value="<?= $datas['id']?>"><?= $datas['name']?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" value="<?= $data['description'] ?>" name="description" class="form-control" id="description" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Starting Price</label>
                            <input type="starting_price" value="<?= $data['starting_price']?>" name="starting_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Starting Price">
                           
						</div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ending Time</label>
                            <input type="datetime" value="<?= $data['starting_time']?>" name="starting_time" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Ending Time</label>
                            <input type="datetime" value="<?= $data['ending_time']?>" name="ending_time" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Images</label>
                            <input type="file" value="<?= $data['images']?>" name="images[]" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time" multiple>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
