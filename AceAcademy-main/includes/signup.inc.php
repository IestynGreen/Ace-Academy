<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $sname = $_POST["sname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $type = $_POST["type"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $sname, $email, $pwd, $pwdRepeat, $type) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../index.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../index.php?error=passwordsdontmatch");
        exit();
    }

    if (emailExists($conn, $email) !== false){
        header("location: ../index.php?error=emailtaken");
        exit();
    }

    if($type =="Student"){
        createUser($conn, $name, $sname, $email, $pwd, $type);
        $sql = "SELECT * FROM users
            WHERE usersEmail='$email'";
        $data = mysqli_query($conn, $sql);
        if (mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_array($data);
            $id = $row["usersId"];
        }
        if(isset($_POST['course1'])){
            courseEnrol($conn, 1, $id);
        }
        if(isset($_POST['course2'])){
            courseEnrol($conn, 2, $id);
        }
        if(isset($_POST['course3'])){
            courseEnrol($conn, 3, $id);
        }
        if(isset($_POST['course4'])){
            courseEnrol($conn, 4, $id);
        }
        header("location: ../index.php?error=none");
        exit();
    }

    if($type =="Tutor"){
        createUser($conn, $name, $sname, $email, $pwd, $type);
        header("location: ../index.php?error=none");
        exit();
    }

    

}
else {
    header("location: ../index.php");
    exit();
}