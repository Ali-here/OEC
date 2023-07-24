<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OEC</title>
    <link rel="icon" href="../../assets/img/icon.png">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="card o-hidden border-0 shadow my-5">
                    <div class="card-body p-0">
                        <div class="row shadow justify-content-center">
                            <div class="col-lg-9">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
                                    </div>
                                    <form class="user" role="form" action="registerprocess.php" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="First Name" name="firstname" type="text" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Last Name" name="lastname" type="text" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Username" name="username" type="text" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Email" name="email" type="email" required value="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Password" name="password" type="password" id="password" value="">
                                            <div id="password-strength"></div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="btnlogin" id="submitBtn">Create Account</button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>


    <script>
        $(document).ready(function() {
            // Password strength checker function
            function checkPasswordStrength(password) {
                const passwordStrength = $("#password-strength");
                const strongRegex = new RegExp(
                    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})"
                );

                if (password.trim() === '') {
                    passwordStrength.hide();
                    $("#submitBtn").prop("disabled", true);
                } else if (strongRegex.test(password)) {
                    passwordStrength.html(
                        '<div class="alert alert-success" role="alert">Strong Password</div>'
                    ).show();
                    $("#submitBtn").prop("disabled", false);
                } else {
                    passwordStrength.html(
                        '<div class="alert alert-warning" role="alert">Weak Password: Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one numeric digit, and one special character.</div>'
                    ).show();
                    $("#submitBtn").prop("disabled", true);
                }
            }

            // Event listener for password input field
            $("#password").on("input", function() {
                const password = $(this).val();
                checkPasswordStrength(password);
            });

            // Check the password on page load
            const initialPassword = $("#password").val();
            checkPasswordStrength(initialPassword);
        });
    </script>
</body>

</html>