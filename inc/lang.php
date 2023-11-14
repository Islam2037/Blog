<?php
require_once "conn.php";
if(isset($_GET['lang']))
{
    $lang=$_GET['lang'];
}
else
{
    $lang="en";
}

if($lang=="en")
{
    $_SESSION['lang']="en";
    header("location: ". $_SERVER['HTTP_REFERER']);
}
else
{
    $_SESSION['lang']="ar";
    header("location: ". $_SERVER['HTTP_REFERER']);

}
