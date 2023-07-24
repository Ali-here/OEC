<?php
include '../includes/connection.php';
?>
            <?php
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $jobb = $_POST['jobs'];


            mysqli_query($db, "INSERT INTO employee
                              (EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL,  JOB_ID)
                              VALUES (Null,'{$fname}','{$lname}','{$email}','{$jobb}')");
            header('location:employee.php');
            ?>