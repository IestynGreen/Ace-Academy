<?php

session_start();

if(isset($_POST["submit"])){


    $name = $_POST["name"];
    $sName = $_POST["sName"];
    $id = $_SESSION["id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    nameChange($conn, $id, $name, $sName);
    exit();
}

?>