<?php
include '../includes/connection.php';
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // Insert employee data
    mysqli_query($db, "INSERT INTO employee (EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL, JOB_ID)
                       VALUES (Null,'{$fname}','{$lname}','{$email}','2')");

    $emp_id = mysqli_insert_id($db);

    // Insert user data
    mysqli_query($db, "INSERT INTO users (ID, EMPLOYEE_ID, USERNAME, PASSWORD, TYPE_ID)
                       VALUES (Null,'{$emp_id}','{$username}',sha1('{$password}'),'2')");

    header('location:login.php');
} catch (Exception $e) {
    // If a unique key constraint error occurs (e.g., email already exists in the database), show an alert
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo '<script>alert("Email already exists in the database!"); window.location = "register.php";</script>';
    }
}
