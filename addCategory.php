<?php
if (isset($_POST['category'])) {
    $category = $_POST['category'];
    include("connection.php");
    mysqli_query($connection, "insert into category values(null,'$category');");
    header("Location: import.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Add Category</title>
</head>

<body>
    <div class="container p-4">
        <h2>Add new Category</h2>
        <form action="addCategory.php" method="post">
            <div class="row mt-3">
                <div class="col">
                    <input type="text" name="category" class="form-control" id="">
                </div>
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-info">
                </div>
            </div>
        </form>
    </div>
</body>

</html>