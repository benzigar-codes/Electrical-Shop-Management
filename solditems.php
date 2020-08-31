<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Sold Items</title>
    <style>
        .icon {
            height: 50px;
            width: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="bg-primary p-4 d-flex justify-content-between">
        <div>
            <h4>Rajesh Electricals</h4>
        </div>
        <div>
            <div class="d-flex">
                <a href="home.php">
                    <button class="btn btn-dark">HOME</button>
                </a>
                <a href="import.php" class="ml-3">
                    <button class="btn btn-dark">Import new products</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    include("connection.php");
    $result = mysqli_query($connection, "select distinct date from sold order by date desc;");
    while ($date = mysqli_fetch_array($result)) {
        echo '
        <div class="container mt-4">
        <h2>Date : ' . $date[0] . '</h2>
        <table class="table">
            <tr>
                <th>
                    SI.NO
                </th>
                <th>
                    Image
                </th>
                <th>
                    Product Name
                </th>
                <th>
                    Price
                </th>
                <th>
                Quantity
                </th>
                <th>
                    Total Price
                </th>
            </tr>';
        $result1 = mysqli_query($connection, "SELECT name,price,quantity,img from product,sold where sold.productid=product.id and sold.date='$date[0]';");
        $no = 1;
        while ($contents = mysqli_fetch_array($result1)) {
            echo '
                <tr>
                <td>' . ($no++) . '</td>
                <td>
                    <img class="icon" src="img/' . $contents[3] . '">
                </td>
                <td>' . $contents[0] . '</td>
                <td>' . $contents[1] . '</td>
                <td>' . $contents[2] . '</td>
                <td>' . $contents[1] * $contents[2] . '</td>
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