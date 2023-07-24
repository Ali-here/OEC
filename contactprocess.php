<?php

if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['content'];
    $formcontent = "From: $name \n Message: $message";
    $recipient = "ali.khan030771@gmail.com";

    $mailheader = "From: $email \r\n";

    $MSG = mail($recipient, $formcontent, $mailheader) or die("Error!");
    header('Location: index.php');

    // print_r($MSG);
}
