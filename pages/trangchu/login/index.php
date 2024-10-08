<?php
session_start();
include("../../../admin/controller/clslogin.php");

$p = new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5" style="background-image: url('../../../img/bannert.png'); background-size: cover; background-position: center;">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary mb-4">Chào mừng trở lại!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Nhập tài khoản" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Mật khẩu" required>
                                        </div>
                                        <input type="hidden" name="btn" value="Đăng nhập">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng nhập">
                                        <hr>
                                    </form>
                                    <?php 
                                    
                                    if (isset($_POST['btn'])) {
                                        switch ($_POST['btn']) {
                                            case 'Đăng nhập':
                                                $user = $_REQUEST["username"];
                                                $pass = $_REQUEST["password"];
                                                if ($user != '' && $pass != '') 
                                                {
                                                    if ($p->loginkhachhang($user, $pass) == 0) 
                                                    {
                                                        echo '<script>alert("Sai Tài khoản hoặc mật khẩu");</script>';
                                                    }
                                                    else
                                                    {
                                                        $_SESSION['khdn'] = 1; 
                                                        exit();
                                                    }
                                                } 
                                                else 
                                                {
                                                    echo '<script>alert("Vui lòng nhập đủ Tài khoản hoặc mật khẩu ");</script>';
                                                }
                                                break;
                                        }
                                    }
                                    
                                    ?>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../js/sb-admin-2.min.js"></script>
</body>
</html>