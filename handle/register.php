<?php
require_once "../inc/conn.php";
$query = "SELECT email FROM users";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) > 0) {
    $emailList = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $emailList = array_column($emailList, 'email');
    // print_r($emailList);
}


if (isset($_POST['submit'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (strlen($name) < 5 || strlen($name) > 30) {
        $errors[] = "Name must be greater than 5 char and less than 30 char ";
    } elseif (is_numeric($name)) {
        $errors[] = "Name not correct ";
    }




    if (empty($email)) {
        $errors[] = "email is required";
    } elseif (in_array($email, $emailList)) {

        $errors[] = "email is exist";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email not correct";
    } elseif (is_numeric($email)) {
        $errors[] = "email not correct ";
    }
    if (empty($password)) {
        $errors[] = "password is required";
    } elseif (strlen($password) < 5 || strlen($password) > 30) {
        $errors[] = "password must be greater than 5 char and less than 30 char ";
    }
    if (empty($phone)) {
        $errors[] = "phone is required";
    } elseif (strlen($phone) != 11) {
        $errors[] = "phone must be 11 number ";
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "insert into users(`userName`,`email`,`password`,`phone`) values ('$name','$email','$password','$phone')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['success'] = "insert is succsesfully";
            header("location:../Login.php");
        } else {
            $_SESSION['errors'] = ["failed in insert user"];
            header("location:../superAdmin/register.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location:../superAdmin/register.php");
    }
} else {
    header("location:../superAdmin/register.php");
}
