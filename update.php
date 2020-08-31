<?php
include("connection.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    mysqli_query($connection, "update product set name='$name',des='$desc',price=$price,stock=$stock where id=$id;");
    header("Location: product.php?id=$id");
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($connection, "select * from product where id=$id;");
    $result = mysqli_fetch_all($result);
    $productid = $result[0][0];
    $productname = $result[0][1];
    $productdesc = $result[0][2];
    $productimg = $result[0][3];
    $productcategory = $result[0][4];
    $productprice = $result[0][5];
    $productstock = $result[0][6];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <title>Update the product</title>
    </head>

    <body>
        <div class="bg-primary p-4 d-flex justify-content-between">
            <div>
                <h4>Rajesh Electricals</h4>
            </div>
            <div>
                <div class="d-flex">
                    <a href="solditems.php">
                        <button class="btn btn-dark">Sold products</button>
                    </a>
                    <a href="import.php" class="ml-3">
                        <button class="btn btn-dark">Import new products</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <h2>Updating the content</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" name="name" id="" value="<?php echo $productname ?>" class="mt-3 form-control">
                <input type="text" name="des" id="" value="<?php echo $productdesc ?>" class="mt-3 form-control">
                <p for="">
                    Price :
                </p>
                <input type="text" name="price" id="" value="<?php echo $productprice ?>" class="mt-3 form-control">
                <p for="">
                    Stock :
                </p>
                <input type="text" name="stock" id="" value="<?php echo $productstock ?>" class="mt-3 form-control">
                <input type="submit" value="Update" class="mt-3 btn btn-primary">
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: home.php");
}
?>