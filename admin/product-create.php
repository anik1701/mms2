<?php
  include 'includes/header.php';
  include 'includes/sidebar.php';
  include '../common.php';

    $sql = "SELECT * FROM categories";
    $rows = $db->query($sql);

    if (isset($_POST['submit'])) {

        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $starting_price = $_POST['starting_price'];
        $starting_time = ($_POST['starting_time']);
        $ending_time = ($_POST['ending_time']);
        $file_size = $_FILES['images']['size'];

        if (!empty($product_name) && !empty($file_size) && !empty($category) && !empty($description) && !empty($starting_price) && !empty($starting_time) && !empty($ending_time)) {


            $target_dir = "images/";

            $count = count($_FILES['images']['name']);

            $images = [];

            for ($i= 0 ; $i < $count; $i++){
                $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
                $images[] = $target_file;
                $file_name = $_FILES['images']['tmp_name'][$i];
                move_uploaded_file($file_name, $target_file);
            }

                $all_image = serialize($images);
                $sql = "INSERT INTO products(`product_name`, `category_id`,`description`, `images`, `starting_price`, `starting_time`, `ending_time`)VALUES('$product_name', '$category', '$description', '$all_image', '$starting_price',' $starting_time','$ending_time')";
                $count = $db->query($sql);
                $message = " Data Inserted Successfully!!";

        } else {
            $message = "All fields are required!!";
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
                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="category" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php
                                    while ($data = $rows->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="exampleInputEmail1">Type</label>-->
<!--                            <select name="type" class="form-control">-->
<!--                                <option value="" selected>Please select one</option>-->
<!--                                --><?php
//                                foreach ($product_types as $key => $value){
//                                    ?>
<!--                                    <option value="--><?//= $key ?><!--">--><?//= $value ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="description" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Starting Price</label>
                            <input type="starting_price" name="starting_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Starting Price">
                           

                        <div class="form-group">
                            <label for="exampleInputPassword1">Starting Time</label>
                            <input type="datetime-local" name="starting_time" class="form-control" id="exampleInputPassword1" placeholder="Enter Starting Time">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Ending Time</label>
                            <input type="datetime-local" name="ending_time" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Images</label>
                            <input type="file" name="images[]" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time" multiple>
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
