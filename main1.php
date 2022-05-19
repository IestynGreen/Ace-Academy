<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    if(!isset($_SESSION["loggedIn"]) || isset($_SESSION["loggedIn"]) != 1){
        header("location: index.php?error=notloggedin");
    }
    if($_SESSION["type"] == "Tutor"){
        header("location: tutorHome.php");
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="website, learning, education, content, quizzes, timetable, tutor, student">
        <meta name="author" content="Ace-Academy">
        <meta name="publisher" content="Ace-Academy">
        <meta name="copyright" content="Ace-Academy">
        <meta name="description" content="Ace-Academy is a modern learning environment, including Quizzes, Timetables and Teacher-Driven Content">
        <meta name="page-topic" content="Education">
        <meta name="page-type" content="Learning">
        <meta name="audience" content="Everyone">
        <meta name="robots" content="noindex, nofollow">
        
        <title>Ace Academy</title>
        <link rel="stylesheet" href="styling/main.css">
        <link rel="icon" href="styling/Assets/favicon.svg">
    </head>
    <body>
        <div class="progress">
        </div>
        <div id="topBar">
            <div id="topBarRight">
                <div id="topBarLinks">
                    <a href="home.php" class="topBarLinksText">Home</a>
                    <a href="index.php" class="topBarLinksText">Log-out</a>
                </div>
            </div>
        </div>
        <div id="sideBar">
            <div id="sideBarLogo">
            <p>Ace <b>Academy</b></p>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-top: 1vh; margin-bottom: 1vh; ", size="1", color=grey>
            <div id="profile">
                <div id="profileVis">
                    <!-- Add student name-->
                    <p id="name"><?php echo $_SESSION["name"] ; ?> <?php echo $_SESSION["sname"] ; ?></p>
                    <p class="downArrow" style="margin-left: 1vh;">❯</p>                    
                </div>
                <div id="profileInvis">
                    <a href="settings.php" id="acountLink">My Account</a>
                    <a href="index.php" id="logOut">Log-Out</a>
                </div>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-bottom: 1vh; margin-top: 1vh;", size="1", color=grey>
            
            <?php
            for($i=1; $i <= 4; $i++){
                if (courseCheck($conn, $i, $_SESSION["id"])){
                    if ($i == 1){
                        echo '              
                        <div class="course">
                            <div class="courseVis">
                                <a href="main' . $i . '.php" class="courseText activeLinkThing">';   echo getCourseName($conn, $i);
                                echo '</a>
                            </div>
                        </div>';
                    } else{
                        echo '              
                        <div class="course">
                            <div class="courseVis">
                                <a href="main' . $i . '.php" class="courseText">';   echo getCourseName($conn, $i);
                                echo '</a>
                            </div>
                        </div>';                        
                    }
                }                
            }
            ?>
        </div>

        <div id="space">
            <h1 class="titleStuff">Website Development</h1>
            <div id="quickLinks">
                <?php quickLinks($conn, 1); ?>
            </div>
            <?php showCoursePage($conn, 1, 'WebDev');?>
        </div>        
        <script src="js/scripts.js"></script>
    </body> 
</html> 