<?php

session_start();
include("includes/dbh.inc.php");

if(isset($_POST['finish'])) {
    header("createquiz.php");
    if(!empty($_POST['quizName']) && !empty($_POST['courses']) ){
        $quizName = $_POST['quizName'];
        $courseID = $_POST['courses'];
        $query = "insert into quizlist(courseID, quizName) values ('$courseID', '$quizName')";
        mysqli_query($conn, $query) or die(mysqli_error());
        echo'<script> window.location.href = "createquiz.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="website, learning, education, content, quizzes, timetable, tutor, student">
    <meta name="author" content="Ace-Academy">
    <meta name="publisher" content="Ace-Academy">
    <meta name="copyright" content="Ace-Academy">
    <meta name="description" content="Ace-Academy is a modern learning environment, including Quizzes, Timetables and Teacher-Driven Content">
    <meta name="page-topic" content="Education">
    <meta name="page-type" content="Learning">
    <meta name="audience" content="Everyone">
    <meta name="robots" content="noindex, nofollow">
    
    <title>Create Quiz</title>
    <link rel="stylesheet" href="styling/quizStart.css">
    <link rel="icon" href="assets/favicon.svg">
</head>
<body>
    <div class="mainContent">
        <form action = "quizstart.php" method="post">
                <div class="titleBit blob">
                    <h3 style="margin-left: 2%;">Create Quiz </h3>
                </div>
                <div class="main">
                    <h3>Enter Quiz Name below: </h3> <br>
                    <input class="inputThing" type="text" name="quizName"> <br>

                    <h3>Select the course:</h3> <br>
                    <select class="inputThing" name="courses" id="courses">
                        <option value="1">WebDev</option>
                        <option value="2">Psychology</option>
                        <option value="4">Banking</option>
                        <option value="3">Maths</option>
                    </select><br>
                    <button class='buttonPress' type="submit" name="finish"> Create Quiz </button>        
                </div>
        </form>
    </div>
    <div id="svgStuff">
    
    </div>
</body>
</html>