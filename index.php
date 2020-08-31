<?php
$msg = "";
if (isset($_POST['username']))
    if (($_POST['username'] == 'admin') && ($_POST['password'] == 123)) {
        session_start();
        $_SESSION['username'] = 'admin';
        header("Location: home.php");
    } else {
        $msg = "Username or password is wrong";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            background-image: url(bg.jpg);
            height: 100vh;
        }
    </style>
    <title>Log in</title>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container bg-white col-sm-10 col-lg-5 col-md-5 card p-4 shadow">
        <h1 class="mb-4 mt-3">Electrical Shop Management</h1>
        <p class="lead text-danger"><?php echo $msg; ?></p>
        <h6 class="ml-2">Admin</h6>
        <form action="index.php" method="post">
            <input type="text" placeholder="username" name="username" id="" class="form-control">
            <br>
            <input type="password" placeholder="password" name="password" id="" class="form-control">
            <input type="submit" value="Log in" class="mt-4 btn btn-primary">
        </form>
    </div>
</body>

</html>