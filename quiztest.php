<?php
    session_start();
    include("includes/dbh.inc.php");
    $questionNum = 1;
    $answerNum = 0;
    $score = 0;

    $quizNum = $_GET['quizNum'];

    ?>
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
    
    <title>TAKE QUIZ</title>
    <link rel="stylesheet" href="styling/quizTest.css">
</head>
<body>



<?php

    $query = "SELECT * FROM quizQA WHERE quizID = '$quizNum' ORDER BY questionID ASC ";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT * FROM quizList WHERE quizID = '$quizNum'";
    $result2 = mysqli_query($conn, $query2);


    $correctArray = [];
    $choiceArray = [];

    $check = false;



    $row3 = mysqli_fetch_array($result2);
    $ham = $row3["quizID"];
    $ham2 = $row3["quizName"];
    $course = $row3["courseID"];
    echo '<h1 id="quizTitle">'.$ham2.'</h1>' ;
    echo "<div id='contentMargin'> ";
    echo "  <div class='content'>";
    //for($p = 0; $p < count($ham); $p++) {
        //if($ham[$p] == $quizNum){
        //}
    //}



    echo '<form action="quiztest.php?quizNum='.$quizNum.'" method="post">';
 
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            //if($row['quizID'] == $quizNum) {

                $ans = array($row['answer1'], $row['answer2'], $row['answer3'], $row['answer4']);

                shuffle($ans);
                $name = 'Button+'.strval($questionNum);
                $val = 'test+'.strval($answerNum);

                echo "<div class='questionBox'>";
                echo "<div class='quizTitle'>";
                    echo '<h1>Question '.$questionNum.'</h1>';
                echo "</div>";
                echo "<div class='main'>";
                echo "<h3>" . $row["question"] . "</h3>" ?>
                <br>
                <p>Select the correct answer below: </p>
                <br> 
                <div class="flexStuff"> 
                <?php foreach ($ans as $choice) {
                    $searchString = " ";
                    $replaceString = "";
                    $choice2 = str_replace($searchString, $replaceString, $choice);
                    ?>
                    <div class="row">

                        <input type=radio name=<?php echo $name ?> value=<?php echo $choice2?>>
                    <label for=<?php echo $name ?>><?php echo $choice ?></label>
                    </div>
                    <?php

                    $answerNum += 1;
                    $val = 'test+'.strval($answerNum);
                }
                echo "</div>";

                if (isset($_POST[$name])) {

                            // Show the radio button value, i.e. which one was checked when the form was sent
                    $x = $_POST[$name];
                   // echo $x;
                    $choiceArray[$questionNum] = $x;
                    //array_push($ChoiceArray, $x);
                }
                else{
                    $choiceArray[$questionNum] = "";
                }

                $choice3 = str_replace($searchString, $replaceString, $row['answer1']);
                $correctArray[$questionNum] = $choice3;
                $questionNum += 1;
                echo "<br>";
                echo "</div>";
                echo "</div>";
            //}
       }
    }
    echo "<br>";
    echo '<button class="buttonSub" type="submit" name="butt" value="Submit"> Finish quiz </button>';
    echo "</div> ";


        if(isset($_POST["butt"])) {
            for ($i = 1; $i < $questionNum; $i++) {
                if ($choiceArray[$i] == $correctArray[$i]) {
                    $score += 1;
                }
            }
            echo '<script>alert(' . $score . ')</script>';
                $studentID = $_SESSION["id"];

                $results = ($score / ($questionNum-1)) * 100;

                $resultset = mysqli_query($conn, "SELECT * FROM studentGrades WHERE studentID='$studentID' AND quizID='$quizNum'");
                $count = mysqli_num_rows($resultset);


                if ($count == 0) {

                    $query3 = "INSERT INTO studentGrades(score, quizID, courseID, studentID) values('$results','$quizNum', '$course', '$studentID')";
                    mysqli_query($conn, $query3) or die(mysqli_error());
                    echo '<script>alert(' . $results . ')</script>';

                } else {
                    echo '<script>alert("You can only sit this test once!")</script>';

                }




        echo'<script>window.location = "home.php"</script>';
    }




                echo'</form>';

    ?>

</body>
</html>