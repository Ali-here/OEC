<?php
include('../includes/connection.php');
require_once('session.php');
$zz = $_POST['id'];
$a = $_POST['firstname'];
$b = $_POST['lastname'];
$d = $_POST['username'];
$e = $_POST['password'];
$f = $_POST['email'];

$query = 'UPDATE users u 
	 						join employee e on e.EMPLOYEE_ID=u.EMPLOYEE_ID
	 						set e.FIRST_NAME="' . $a . '", e.LAST_NAME="' . $b . '", USERNAME="' . $d . '", PASSWORD = sha1("' . $e . '"),  EMAIL="' . $f . '" WHERE
					ID ="' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));


?>
<?php

$sql = 'SELECT ID
                          FROM users';
$result2 = mysqli_query($db, $sql) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result2)) {
    $a = $row['ID'];

    if ($_SESSION['TYPE'] == 'Admin') { ?>

        <script type="text/javascript">
            alert("You've updated your account successfully.");
            window.location = "index.php";
        </script><?php

                } elseif ($_SESSION['TYPE'] == 'User') { ?>

        <script type="text/javascript">
            alert("You've updated your account successfully.");
            window.location = "index.php";
        </script><?php
                }
                    ?>

<?php } ?>