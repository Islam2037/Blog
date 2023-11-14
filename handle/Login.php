<?php
require_once "../inc/conn.php";
if (isset($_POST['submit'])) 
{
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $query = "select * from users where email='$email'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) == 1) 
    {
        $user = mysqli_fetch_assoc($res);
        $userPassword =$user['password'];
        $userId =$user['id'];
        $userName =$user['userName'];
        if(password_verify($password,$userPassword))
        {
            $_SESSION['success']="Hello $userName";
            $_SESSION['userid']=$userId;
            $_SESSION['userName']=$userName;

            header("location:../index.php");

        }
        else
        {
            $_SESSION['errors']=["Email or Password is not correct"];
            header("location:../Login.php");

        }
     
    }
    else
    {
        $_SESSION['errors']=["Account not exist"];
        header("location:../Login.php");
        
    }
}
else 
{
    header("location:../Login.php");
}
