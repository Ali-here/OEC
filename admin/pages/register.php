<?php require('session.php'); ?>
<?php if (logged_in()) { ?>
    <script src="../assets/js/index.js"></script>
<?php
} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Encoderbytes Dashboard</title>
    <link rel="icon" href="../assets/img/logo2.png">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-7 col-md-7">

                <div class="card o-hidden border-0 shadow my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row shadow justify-content-center">
                            <div class="col-lg-9">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Encoderbytes Admin Panel</h1>
                                    </div>
                                    <form class="user" role="form" action="processlogin.php" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Username" name="user" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Email" name="email" type="email" value="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Password" name="password" type="password" value="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="confirm Password" name="password" type="password" value="">
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="btnlogin">Create Account</button>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="login.php">Sign In</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <footer class="footer text-center mt-5"> &COPY <?php echo date('Y'); ?> Made with ❤️ by <a href="https://www.encoderbytes.com/">Encoder Bytes.</a> All Rights
        Reserved.
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>