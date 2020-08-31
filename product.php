<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    include("connection.php");
    mysqli_query($connection, "DELETE FROM product where id=$id;");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("connection.php");
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
        <title>product Details</title>
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
                    <a href="home.php" class="ml-3">
                        <button class="btn btn-dark">Home</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-bottom bg-primary p-4">
            <div class="container mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-dark">Product Details : </h1>
                                <h4 class="text-dark">ID : <small><?php echo $productid; ?></small></h4>
                                <h4 class="text-dark">Name : <small><?php echo $productname; ?></small></h4>
                                <h4 class="text-dark">Description : <small><?php echo $productdesc; ?></small></h4>
                                <h4 class="text-dark">Category :
                                    <a href="search.php?search=<?php echo $productcategory; ?>">
                                        <small><?php echo $productcategory; ?></small>
                                    </a>
                                </h4>
                                <h4 class="text-dark">Price : Rs. <small><?php echo $productprice; ?></small></h4>
                                <h4 class="text-dark">Stock : <small><?php echo $productstock; ?></small></h4>
                                <div class="d-flex">
                                    <a href="product.php?delete=<?php echo $id; ?>">
                                        <button class="mr-3 btn btn-info">Delete the product</button>
                                    </a>
                                    <a href="sell.php?id=<?php echo $id; ?>">
                                        <button class="mr-3 btn btn-info">Sell the product</button>
                                    </a>
                                    <a href="update.php?id=<?php echo $id; ?>">
                                        <button class="mr-3 btn btn-info">
                                            Update the product</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="img/<?php echo $productimg  ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <h1>Sold Details</h1>
            <p class="lead">Total Sold : </p>
        </div>

        <!--MEDICINES LIST-->

        <div class="container">
            <div class="card p-4 mt-3">
                <table class="table">
                    <tr class="text-dark">
                        <th>
                            SI NO
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Date
                        </th>
                    </tr>
                    <?php
                        $result = mysqli_query($connection, "select * from sold where productid=$id order by date desc;");
                        $si = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                                <tr>
                                    <td>" . $si++ . "</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                </tr>
                            ";
                        }

                        ?>
                </table>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: home.php");
}
?>