<?php
session_start();
include("connection.php");
if (isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <title>Home</title>
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
        <div class="container p-4 m-4 border">
            <form action="search.php" method="GET">
                <h6>Search a Product : </h6>
                <div class="row">
                    <div class="col-10">
                        <input type="text" name="search" id="" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>

        <?php
            $result = mysqli_query($connection, "select id,name,img,price,stock from product where stock <= 5;");
            if (mysqli_num_rows($result)) {
                $no = 1;
                echo '
                <div class="container mt-3">
            <div class="row mb-3">
                <div class="col">
                    <h1 class="text-danger">Products to be Updated</h1>
                </div>
            </div>
            <p class="lead">These are almost out of stock !!</p>
            <table class="table">
                <tr>
                    <th>SI NO</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Update</th>
                </tr>';
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        <tr>
                            <td>' . ($no++) . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[3] . '</td>
                            <td>' . $row[4] . '</td>
                            <td>
                                <a href="update.php?id=' . $row[0] . '">
                                    <button class="btn btn-primary">Update the product</button>
                                </a>
                            </td>
                        </tr>
                        ';
                }
                echo ' </table>
            </div>
            ';
            }
            ?>
        <hr>

        <?php
            $result = mysqli_query($connection, "select distinct name from category;");
            if (mysqli_num_rows($result)) {
                echo '
                <div class="container mt-3">
            <div class="row mb-3">
                <div class="col">
                    <h1 class="text-info">Categories</h1>
                </div>
            </div>
            <table class="table">
            <tr>
                <th>SI NO</th>
                <th>Category Name</th>
                <th>Go</th>
            </tr>
            ';
                $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        
                        <tr>
                            <td>' . ($no++) . '</td>
                            <td>' . $row[0] . '</td>
                            <td>
                                <a href="search.php?search=' . $row[0] . '">
                                    <button class="btn btn-primary">View</button>
                                </a>
                            </td>
                        </tr>
                        ';
                }
                echo '
            </table>
        </div>
            ';
            }
            ?>


        <?php
            $result = mysqli_query($connection, "SELECT sold.productid ,product.name, sum(quantity) from product,sold where sold.productid=product.id group by sold.productid order by sum(quantity) desc limit 0,5;");
            if (mysqli_num_rows($result)) {
                echo '
                <div class="container">
            <h1 class="text-info">Most Sold Products List : </h1>
            <table class="table">
                <tr>
                    <th>SI NO</th>
                    <th>Product</th>
                    <th>Total Quantity Sold</th>
                    <th>Go</th>
                </tr>
                ';
                $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        
                        <tr>
                            <td>' . ($no++) . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[2] . '</td>
                            <td>
                                <a href="product.php?id=' . $row[0] . '">
                                    <button class="btn btn-primary">View</button>
                                </a>
                            </td>
                        </tr>
                        ';
                }
                echo '
            </table>
        </div>
            ';
            }
            ?>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>