<?php
session_start();
include("includes/dbh.inc.php");

$sql = mysqli_query($conn,"SELECT MAX(QuizID) FROM quizlist");
$row = mysqli_fetch_array($sql);
$maxID = $row[0];



if(isset($_POST['enter'])){

    if(!empty($_POST['question']) && !empty($_POST['answer1']) && !empty($_POST['answer2']) && !empty($_POST['answer3']) && !empty($_POST['answer4'])){
        echo '<script>alert("")</script>';
        $question = $_POST['question'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];

        $query = "insert into quizqa(QuizID, question, answer1, answer2, answer3, answer4) values('$maxID', '$question' , '$answer1', '$answer2', '$answer3', '$answer4')";
        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($run){
            echo "Form submitted successfully";
        }
        else{
            echo "Form not submitted";
        }
    }
    else{
        echo " all fields required";
    }
}

if(isset($_POST['finish'])) {
    echo '<script>alert("quiz saved")</script>';

    if(!empty($_POST['question']) && !empty($_POST['answer1']) && !empty($_POST['answer2']) && !empty($_POST['answer3']) && !empty($_POST['answer4'])){
        echo '<script>alert("")</script>';

        $question = $_POST['question'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];


        $query = "insert into quizqa(QuizID, question, answer1, answer2, answer3, answer4) values('$maxID', '$question' , '$answer1', '$answer2', '$answer3', '$answer4')";
        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));}
    echo'<script> window.location.href = "home.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Create Quiz</title>
    <link rel="icon" href="styling/Assets/favicon.svg">
    <link rel="stylesheet" href="styling/quizStart.css">
</head>

<body>
    <div class="mainContent">
        <form action = "createquiz.php" method="post">
            <div class="titleBit blob">
                <h3 style="margin-left: 2%;">Create Question</h3>
            </div>
            <div class="main">
                <p>Enter Question Below</p>
                <input class="inputThing" type="text" name="question">
                <p>Enter Correct Answer Below</p>
                <input class="inputThing" type="text" name="answer1">
                <p>Enter answer below</p>
                <input class="inputThing" type="text" name="answer2">
                <p>Enter Answer Below</p>
                <input class="inputThing" type="text" name="answer3">
                <p>Enter Answer Below</p>
                <input class="inputThing" type="text" name="answer4">
                <br>
                <br>
                <button class='buttonPress' type="submit" name="enter"> Add Question </button>
                <button class='buttonPress' type="submit" name="finish"> Finish Quiz </button>
            </div>
        </form>        
    </div>
    <div id="svgStuff">
    
    </div>
</body>
</html>