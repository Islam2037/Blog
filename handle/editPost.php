<?php
require_once "../inc/conn.php";
if(!empty($_SESSION['userid']))
{

    require_once "../inc/conn.php";
    if (isset($_POST['submit']) && isset($_GET['id'])) {
        //catch,validation,update
    $id = $_GET['id'];
    $title = trim(htmlspecialchars($_POST['title']));
    $desc = trim(htmlspecialchars($_POST['body']));
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageError = $image['error'];
    $tmpName = $image['tmp_name'];
    $size = $image['size'];
    $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $newName = uniqid() . "." . $ext;
    $errors = [];
    if (empty($title)) {
        $errors[] = "title is required";
    } elseif (is_numeric($title)) {
        $errors[] = "title must be a text";
    }
    if (empty($desc)) {
        $errors[] = "body is required";
    } elseif (is_numeric($desc)) {
        $errors[] = "body must be a text";
    }
    if (empty($errors)) {
        $query = "select * from posts where id=$id";
        $result = mysqli_query($conn, $query);
        $oldImage = mysqli_fetch_assoc($result)['image'];
        // $_SESSION['islam']="islam";
        if (mysqli_num_rows($result) > 0) {

            if (!empty($imageName)) {
                $query = "update posts set `title`='$title',`desc`='$desc',`image`='$newName'where id=$id";
            } else {
                $query = "update posts set `title`='$title',`desc`='$desc',`image`='$oldImage'where id=$id";
            }
            
            $res = mysqli_query($conn, $query);
            if ($res) {
                if (!empty($imageName)) {
                    
                    unlink("../assets/images/postImage/$oldImage");
                    move_uploaded_file($tmpName, "../assets/images/postImage/$newName");
                    $_SESSION['success'] = "update is succsesfully";
                    header("location:../viewPost.php?id=$id");
                } else {
                    $_SESSION['success'] = "update is succsesfully";
                    header("location:../viewPost.php?id=$id");
                }
            } else {
                $_SESSION['success'] = "update is failed";
                header("location:../index.php");
            }
            // move_uploaded_file($tmpName, "../assets/images/postImage/$newName");
            // $_SESSION['success'] = "update is succsesfully";
            // header("location:../index.php");
        } else {
            $errors[] = ["update is failed"];
            header("location:../index.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location:../addPost.php");
    }
} else {
    header("location:../index.php");
}

}
else
{
    header("location:./Login.php");
}