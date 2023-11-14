<?php
require_once "../inc/conn.php";
unset($_SESSION['userid']);
unset($_SESSION['userName']);
header("location:../index.php");