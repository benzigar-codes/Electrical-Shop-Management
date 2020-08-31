<?php
$msg = '';
include("connection.php");
if (isset($_GET['id']) && isset($_GET['quantity'])) {
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    $quantitybalance = mysqli_query($connection, "select stock from product where id=$id;");
    $quantitybalance = mysqli_fetch_all($quantitybalance);
    $quantitybalance = $quantitybalance[0][0];
    $quantitybalance = $quantitybalance - $quantity;
    if ($quantitybalance >= 0) {
        mysqli_query($connection, "insert into sold(productid,quantity,date) values($id,$quantity,curdate());");
        mysqli_query($connection, "update product set stock = $quantitybalance where id=$id;");
        header("Location: home.php");
    } else {
        $msg = "Sorry, we don't have that stock of quantity";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Sell now</title>
</head>

<body class="bg-info">
    <div class="container bg-white mt-3 p-4 shadow col-4">
        <form action="sell.php" method="get">
            <h4 class="text-danger"><?php echo $msg; ?></h4>
            <h1 class="text-dark">Sell the product with ID <?php echo $_GET['id']; ?></h1>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <hr>
            <h3 class="text-dark">Enter the number of quantity : </h3>
            <input required type="number" name="quantity" value="1" id="" class="form-control">
            <hr>
            <input type="submit" value="Sell" class="btn btn-primary">
        </form>
    </div>
</body>

</html>