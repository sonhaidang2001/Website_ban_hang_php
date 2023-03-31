<?php
session_start();
ob_start();
// các model
include "../model/connect.php";
include "../model/user.php";

if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    // kiểm tra mật khẩu và tên đăng nhập
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
    if ($role == 1) header('location: index.php');
    else {
        $text_error = ' <p style="color:red">Username hoăc password không tồn tại</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../public/assets/favicon.ico" />

</head>

<body class="bg-dark ">
    <div class="card card-position bg-dark border-light w-50 mx-auto my-5">
        <div class="card-body">
            <div class="container-fluid">
                <h1 class="text-center text-white">ADMIN</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="my-input" class="text-white">Name:</label>
                        <input id="my-input" class="form-control " type="text" name="user">
                    </div>
                    <div class="form-group">
                        <label for="my-input" class="text-white">Password:</label>
                        <input id="my-input" class="form-control" type="text" name="pass">
                    </div>
                    <?php
                    if (isset($text_error) && ($text_error != "")) {
                        echo $text_error;
                    }
                    ?>
                    <input type="submit" value="Submit" name="dangnhap" class="btn btn-outline-light ">

                </form>
            </div>
        </div>
    </div>

</body>

</html>