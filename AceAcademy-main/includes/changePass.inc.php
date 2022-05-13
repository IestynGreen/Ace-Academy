<?php

session_start();

if(isset($_POST["submit"])){

    $curPwd = $_POST["curPwd"];
    $newPwd = $_POST["newPwd"];
    $newPwdR = $_POST["newPwdR"];
    $id = $_SESSION["id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    passwordChange($conn, $id, $curPwd, $newPwd, $newPwdR);
    header("location: ../settings.php");
    exit();
}

?>