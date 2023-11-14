<?php
require_once "inc/conn.php";
if(empty($_SESSION['lang']))
{
  $_SESSION['lang']='en';
}


  $lang= $_SESSION['lang'];


if($lang=="ar")
{
  require_once "inc/msgAr.php";
}
else
{
  require_once "inc/msgEn.php";
}


?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader" >
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="padding-0">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2> <em><?php echo $msg['blog'] ?></em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php"><?php echo $msg['All Posts'] ?>
                  <span class="sr-only">(current)</span>
                </a>
              </li> 

              <li class="nav-item  ">
                <a class="nav-link  " href="addPost.php"><?php echo $msg['Add New Post'] ?></a>
              </li>
              <?php
              if($lang=="en")
              {
                ?>
                <li class="nav-item">
                <a class="nav-link" href="inc/lang.php?lang=ar">العربية</a>
              </li>
                <?php
              }
              else
              {
                ?>
                <li class="nav-item">
                <a class="nav-link" href="inc/lang.php?lang=en">English</a>
              </li>
                
                <?php
              }
              ?>
              
              
              <?php
              if(empty($_SESSION['userid']))
              {
                ?>
                <li class="nav-item">
               <a class="nav-link" href="./Login.php"><?php echo $msg['Login'] ?></a>
              </li>
                
                <?php
              }
              else
              {
                ?>
                <li class="nav-item">
               <a class="nav-link" href="./handle/logout.php"><?php echo $msg['Logout'] ?></a>
              </li>
                
                <?php

              }
              ?>
              
              <?php
              if(!empty($_SESSION['userName']))
              {
                ?>
                <li class="nav-item">
               <a class="nav-link" href="##"><?php echo $_SESSION['userName']  ?></a>
              </li>
                
                <?php
              }
              ?>
                 
            
             
            </ul>
          </div>
        </div>
      </nav>
    </header>