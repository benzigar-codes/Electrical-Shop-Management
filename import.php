<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Import new Products</title>
</head>

<body>
    <?php
    if (isset($_POST['title'])) {
        $title = str_replace("'", " ", $_POST['title']);
        $detail = str_replace("'", " ", $_POST['detail']);
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $newname = uniqid() . ".jpg";
        move_uploaded_file($tempname, "img/" . $newname);
        include('connection.php');
        mysqli_query($connection, "INSERT INTO product values(null,'$title','$detail','$newname','$category',$price,$stock,curdate());");
        echo "Imported";
    }
    ?>
    <div class="bg-primary p-4 d-flex justify-content-between">
        <div>
            <h4>Rajesh Electricals</h4>
        </div>
        <div>
            <div class="d-flex">
                <a href="solditems.php">
                    <button class="btn btn-dark">Sold products</button>
                </a>
                <a href="home.php" class="ml-3">
                    <button class="btn btn-dark">HOME</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h2>Enter the product Details, ,,</h2>
        <form action="import.php" method="post" enctype="multipart/form-data">
            <label for="title">Enter the Name of the product</label>
            <input required type="text" name="title" id="" class="form-control">
            <label for="">Enter the description (If Any) </label>
            <textarea class="form-control" name="detail" id="" cols="30" rows="10"></textarea>
            <div class="mt-2">
                <label for="">Choose an image of the product,, </label>
                <input required type="file" name="image" id="">
            </div>
            <label for="">Select a Category of the product</label>
            <select name="category" class="form-control" id="">
                <?php
                include("connection.php");
                $cate = mysqli_query($connection, "Select name from category;");
                while ($catRow = mysqli_fetch_array($cate)) {
                    echo '<option value="' . $catRow[0] . '">' . $catRow[0] . '</option>';
                }
                ?>
            </select>
            <br>
            <label class="mt-4" for="price">Enter the Price of the product</label>
            <input required type="text" name="price" id="" class="form-control">
            <br>
            <label for="stock">Enter the Stock of the product</label>
            <input required type="text" name="stock" id="" class="form-control">
            <br>
            <input required type="submit" value="Import" class="mt-3 mb-4 btn btn-primary">
        </form>
    </div>
    <div class="container">
        <a href="addCategory.php">
            <button class="mt-3 btn btn-secondary">Add more category list in here,, </button>
        </a>
    </div>
</body>

</html>