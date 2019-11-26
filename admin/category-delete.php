<?php
    include '../config/db.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM categories WHERE id = '$id'";

        if ($db->query($sql)){
            header('Location:category-list.php');
        }
    }
?>