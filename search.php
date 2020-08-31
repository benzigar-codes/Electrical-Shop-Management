<?php
include("connection.php");
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = mysqli_query($connection, "select id,name,des,img,category,price,stock from product where name like '%$search%' || id='$search' || des like '%$search%' || category like '%$search%' || price='$search';");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <title>Search Result</title>
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
        <div class="row no-gutters">
            <?php
                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                        <div class="col-4">
                            <div class="container mt-3">
                                    <div class="card">
                                        <div class="card-body text-dark">
                                            <img class="img-fluid" src="img/' . $row[3] . '"/>
                                            <h4 class="text-dark">' . $row[1] . '</h4>
                                            <p class="text-dark">Price : <small>' . $row[5] . '</small></p>
                                            ';
                        if ($row[6] == 0)
                            echo "<h4 class='text-danger'>out of stock</h4>";
                        else {
                            echo '<p class="text-dark">Stock : <small>' . $row[6] . '</small></p>';
                        }
                        echo '
                                            <a href="product.php?id=' . $row[0] . '">
                                                <button class="btn btn-block btn-primary">View</button>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        ';
                    }
                } else {
                    echo "<h1 class='m-4'>No result found</h1>";
                }
                ?>

        </div>
    </body>

    </html>
<?php
} else {
    header("Location: home.php");
}
?>