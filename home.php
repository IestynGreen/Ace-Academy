<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    if(!isset($_SESSION["loggedIn"]) || isset($_SESSION["loggedIn"]) != 1){
        header("location: index.php?error=notloggedin");
    }
    if($_SESSION["auth"] == 0){
        header("location: index.php?error=notauthorised");
    }
    if($_SESSION["type"] == "Tutor"){
        header("location: tutorSettings.php");
    }
    if($_SESSION["type"] == "Admin"){
        header("location: admin.php");
    }
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Ace Academy</title>
        <link rel="stylesheet" href="styling/home.css">
        <link rel="icon" href="styling/Assets/favicon.svg">
        
        <meta name="keywords" content="website, learning, education, content, quizzes, timetable, tutor, student">
        <meta name="author" content="Ace-Academy">
        <meta name="publisher" content="Ace-Academy">
        <meta name="copyright" content="Ace-Academy">
        <meta name="description" content="Ace-Academy is a modern learning environment, including Quizzes, Timetables and Teacher-Driven Content">
        <meta name="page-topic" content="Education">
        <meta name="page-type" content="Learning">
        <meta name="audience" content="Everyone">
        <meta name="robots" content="noindex, nofollow">
    </head>
    <body id="appBody">
        <div id="sideBar">
            <div id="sideBarLogo">
                <p>Ace <b>Academy</b></p>
            </div>
            <div id="listOfLinks">
                <div class="course">
                    <div class="courseVis" id="active">
                        <img src="styling/Assets/home.svg">
                        <p id="homeClick">Overview</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="styling/Assets/test.png">
                        <p class="courseText" id="quizClick">Quizzes</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="styling/Assets/timetable.png">
                        <p class="courseText" id="timeClick">Timetable</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="styling/Assets/online-course.png">
                        <a href="main1.php" class="courseText">Courses</a>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="styling/Assets/exam.png">
                        <p class="courseText" id="gradesClick">Grades</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="styling/Assets/settings.png">
                        <a href="settings.php"><p class="courseText">Settings</p></a>
                    </div>
                </div>
                <div class="course account">
                    <div class="courseVis">
                        <img src="styling/Assets/logout.png">
                        <a href="index.php"><p class="courseText">Log-out</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="overview">
            <div id="welcomeText">
                <p>Hello, <?php echo $_SESSION["name"] ; ?> <?php echo $_SESSION["sname"] ; ?> 👋</p>
                <br>
                <p id="welcomeTextSmall">"Live Laugh Love"</p>
            </div>
            <div id="course">
                <p id="coursesTitle">Courses</p>
                <div id="rowOfCourses">
                    <?php 
                    $count = 0;
                    for($i = 1; $i<=4; $i++){
                        if(courseCheck($conn, $i, $_SESSION["id"])){
                            $count ++;
                            $link = 'main.php';
                            if($i == 1){
                                echo '<a href="main1.php">';
                                echo'<div class="coruseBox wave-no-border" >';
                            }
                            if($i == 2){
                                echo '<a href="main2.php">';

                                echo'<div class="coruseBox bluePurple-no-border">';
                            }
                            if($i == 3){
                                echo '<a href="main3.php">';
                                echo'<div class="coruseBox triangle-no-border">';
                            }
                            if($i == 4){
                                echo '<a href="main4.php">';
                                echo'<div class="coruseBox jag-no-border">';
                            }
                            echo '
                                    <div class="courseTitleContain">
                                        <h1 class="courseTitle">Core 1: '; echo getCourseName($conn, $i); echo '</h1> 
                                        <p>'; echo getCourseDesc($conn, $i); echo '</p>
                                        
                                    </div>
                                </div>';
                            echo '</a>';
                        }
                    }
                    if($count == 0){
                        echo"
                        <p style='color:black'>Nothing to show.</p>";
                    }
                    
                    ?>
                </div>
            </div>
            <div id="bottomSection">
                <div id="progress">
                    <h1>Total Progress</h1>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <?php getCourseGrade($conn, $_SESSION["id"], 0) ?>

                </div>
                <div id="quizSection">
                    <h1>Quizzes</h1>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="downLoadArea">
                        <div class="downLoadAreaTitle">
                            <div class="name">
                                <p>Name</p>
                            </div>
                            <div class="coruseMark">
                                <p>Course</p>
                            </div>
                        </div>
                        <?php showRecentQuiz($conn, $_SESSION["id"]); ?>
                </div>                
            </div>
        </div>
        
        <div id="quizBig">
            <div id="quizMenu">
                <?php displayQuizContainer($conn, $_SESSION['id']); ?>
            </div>
        </div>

        <div id="calendarBig">
            <div id="callenderContainer">
                <iframe src="https://calendar.google.com/calendar/embed?height=400&wkst=2&bgcolor=%23616161&ctz=Europe%2FLondon&showNav=1&showDate=0&showPrint=0&showTabs=1&showCalendars=0&showTz=0&mode=WEEK&showTitle=0&src=aGo1Y25yczZoN2w4Y3VuZHQ2dDF1dWR2bjBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23F4511E" style="border-width:0" width="400" height="400" frameborder="0" scrolling="no"></iframe>            
            </div>
        </div>

        <div id="gradesBig">
        <?php displayGrades($conn, $_SESSION["id"]); ?>
        </div>
        <script src="js/home.js"></script>
    </body>
</html>