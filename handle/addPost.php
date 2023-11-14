<?php

require_once "../inc/conn.php";
if(!empty($_SESSION['userid']))
{
    $userid=$_SESSION['userid'];

    if(isset($_POST['submit']))
    {
        //catch,validation,insert
        
        $title=trim(htmlspecialchars($_POST['title']));
        $desc=trim(htmlspecialchars($_POST['body']));
        $image=$_FILES['image'];
        $imageName=$image['name'];
        $imageError=$image['error'];
        $tmpName=$image['tmp_name'];
        $size=$image['size'];
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $newName=uniqid().".".$ext;
        $errors=[];
        if(empty($title))
        {
            $errors[]="title is required";
        }
        elseif(is_numeric($title))
        {
            $errors[]="title must be a text";
        }
        if(empty($desc))
        {
            $errors[]="body is required";
        }
        elseif(is_numeric($desc))
        {
            $errors[]="body must be a text";
        }
    if($imageError>0)
    {
        $errors[]="image is required";
        
    }
    elseif($size/(1024*1024)>1)
    {
        $errors[]="image is largest";
    }
    elseif(! in_array($ext,['jpg','png','jpeg']))
    {
        $errors[]="image not correct";
    }
    if(empty($errors))
    {
        $query="insert into posts(`desc`,`title`,`image`,`user_id`) values('$desc','$title','$newName',$userid)" ;
        $res=mysqli_query($conn,$query);
        if($res)
        {
            move_uploaded_file($tmpName,"../assets/images/postImage/$newName");
            $_SESSION['success']="insert is succsesfully";
            header("location:../index.php");
        }
        else
        {
            $errors[]=["insert is failed"];
            header("location:../index.php");
        }
    }
    else
    {
        $_SESSION['errors']=$errors;
        header("location:../addPost.php");
        
    }
}
else
{
    header("location:addPost.php");
}
}
else
{
    header("location:../index.php");
}