<?php
require_once "../inc/conn.php";

if(!empty($_GET['id']))
{
  if(!empty($_SESSION['userid']))
  {
    $id=$_GET['id'];
    $query="select id from posts where id=$id";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0)
    {
      $query="delete from posts where id=$id";
      $res=mysqli_query($conn,$query);
      if($res)
      {
          $_SESSION['success']="delete is succsesfully";
          header("location:../index.php");
      }
      else
      {
          $errors[]=["delete is failed"];
          header("location:../index.php");
  
      }
  
    }

  }
  else
  {
    header("location:./Login.php");
  }



}
else
{
    header("location:../index.php");


}