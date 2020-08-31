<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    print_r($_POST);
    include("connection.php");
    mysqli_query($connection, "INSERT into patients(name,age,address,gender,registered) values('$name',$age,'$address','$gender',curdate());");
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Add Patient</title>
</head>

<body>
    <div class="d-flex justify-content-center bg-info p-4">
        <a class="text-white mr-3" href="home.php">
            <svg height=25 width=25 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-home fa-w-18">
                <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" class=""></path>
            </svg>
        </a>
        <a class="text-white" href="pharmacy.php">
            <svg height=25 width=25 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="prescription-bottle-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-prescription-bottle-alt fa-w-12">
                <path fill="currentColor" d="M360 0H24C10.8 0 0 10.8 0 24v48c0 13.2 10.8 24 24 24h336c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24zM32 480c0 17.6 14.4 32 32 32h256c17.6 0 32-14.4 32-32V128H32v352zm64-184c0-4.4 3.6-8 8-8h56v-56c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v56h56c4.4 0 8 3.6 8 8v48c0 4.4-3.6 8-8 8h-56v56c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8v-56h-56c-4.4 0-8-3.6-8-8v-48z" class=""></path>
            </svg>
        </a>
    </div>
    <div class="container mt-4">
        <form action="addpatient.php" method="post">
            <h1>Fill the following</h1>
            <input required placeholder="name" type="text" name="name" id="" class="form-control m-4">
            <input required placeholder="age" type="text" name="age" id="" class="form-control m-4">
            <input required placeholder="address" type="text" name="address" id="" class="form-control m-4">
            <select required class="form-control m-4" name="gender" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <input type="submit" value="Add Patient" class="btn btn-primary">
        </form>
    </div>
</body>

</html>