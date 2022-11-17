<?php
include 'database.php';

$query = "SELECT products.*, categories.name as category_name FROM products 
        INNER JOIN categories on products.category_id = categories.id 
        WHERE products.id = '$_GET[view_id]'";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>product</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <h2><?php echo $row['name'] ?></h2>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="main">
                <div class="product">
                    <div class="img">
                        <img src="img/<?php echo $row['image'] ?>" alt="">
                    </div>
                    <div class="info">
                        <div class="price">$<?php echo $row['price'] ?></div>
                        <div class="category">
                            <p class="p">Category</p>
                            <input type="text" disabled value="<?php echo $row['category_name'] ?>">
                        </div>
                        <div class="quantity">
                            <p class="p">Quantity</p>
                            <input type="text" disabled value="<?php echo $row['quantity'] ?>">
                        </div>
                        <div class="details">
                            <p class="p">Details</p>
                            <textarea disabled name="" id="" cols="" rows="6"><?php echo $row['details'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>