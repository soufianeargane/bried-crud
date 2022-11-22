<?php
require 'database.php';

if (isset($_POST['addproduct'])) {
    saveTask();
}
if (isset($_POST['delete'])) {
    # code...
    deleteProduct();
}
if (isset($_POST['updateproduct'])) {
    # code...
    updateProduct();
}
function saveTask()
{
    global $conn;
    // path to store the upload image

    $filename   = uniqid(); // 5dab1961e93a7
    $extension  = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // jpg
    $basename   = $filename . "." . $extension;

    $target = "img/" . $basename;
    // data from modal
    $name = $_POST['name'];
    // $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $details = $_POST['details'];
    $image = $basename;
    $query = "INSERT INTO `products`( `name`, `price`, `category_id`, `quantity`, `details`, `image`) 
    VALUES ('$name','$price','$category','$quantity','$details','$image')";

    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    # code...
    if (mysqli_query($conn, $query)) {
        # code...
        header("location: index.php");
        $_SESSION['product'] = "Product is uploaded successfully";
    }
}

function reloadProduct()
{
    global $conn;
    $query = "SELECT products.*, categories.name as category_name FROM products INNER JOIN categories on products.category_id = categories.id";
    $data = mysqli_query($conn, $query);
    return $data;
}

function deleteProduct()
{
    global $conn;
    $id = $_POST['id'];
    $query = "SELECT * FROM `products` WHERE id = $id";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    $img = $row['image'];
    //vad506_main.jpg
    $img_path = "img/" . $img;
    unlink($img_path);
    $sql = "DELETE FROM `products` WHERE id = $id ";
    if (mysqli_query($conn, $sql)) {
        # code...
        header("location: index.php");
        $_SESSION['product'] = "Product is deleted successfully";
    }
}

function updateProduct()
{
    global $conn;
    $id = $_POST['editId'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $details = $_POST['details'];
    $image = $_FILES["image"]["name"];
    //echo $image;


    if (empty($image)) {
        $query = "UPDATE `products` 
        SET `name`='$name',`price`='$price',`category_id`='$category',`quantity`='$quantity',`details`='$details ' 
        WHERE `id` = $id ";
        if (mysqli_query($conn, $query)) {
            header("location: index.php");
            $_SESSION['product'] = "Product is updated successfully";
        }
    } else {
        $query = "SELECT * FROM `products` WHERE id = $id";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
        $img = $row['image'];
        //vad506_main.jpg
        $img_path = "img/" . $img;
        unlink($img_path);
        $filename   = uniqid(); // 5dab1961e93a7
        $extension  = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // jpg
        $basename   = $filename . "." . $extension;
        $image = $basename;
        $target = "img/" . $basename;
        // echo $target;

        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE `products` 
        SET `name`='$name',`price`='$price',`category_id`='$category',`quantity`='$quantity',`details`='$details',`image`='$image' 
        WHERE `id` = $id ";
        if (mysqli_query($conn, $query)) {
            header("location: index.php");
            $_SESSION['product'] = "Product is updated successfully";
        }
        // delete picture from folder because new picture is added

    }
}
