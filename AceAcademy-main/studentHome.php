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
    <head>
        <meta charset="UTF-8">
        <title>Ace Academy</title>
        <link rel="stylesheet" href="home.css">
        <link rel="icon" href="Assets/favicon.svg">
    </head>
    <body id="appBody">
        <div id="sideBar">
            <div id="sideBarLogo">
                <p>Ace <b>Academy</b></p>
            </div>
            <div id="listOfLinks">
                <div class="course">
                    <div class="courseVis" id="active">
                        <img src="assets/home.svg">
                        <p id="homeClick">Overview</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="assets/test.png">
                        <p class="courseText" id="quizClick">Quizzes</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="assets/timetable.png">
                        <p class="courseText" id="timeClick">Timetable</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="assets/online-course.png">
                        <a href="main1.php" class="courseText">Courses</a>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="assets/exam.png">
                        <p class="courseText" id="gradesClick">Grades</p>
                    </div>
                </div>
                <div class="course">
                    <div class="courseVis">
                        <img src="assets/settings.png">
                        <a href="settings.php"><p class="courseText">Settings</p></a>
                    </div>
                </div>
                <div class="course account">
                    <div class="courseVis">
                        <img src="assets/logout.png">
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
                    <div class="progressBar">
                        <div id="progressCircle">
                            <div class="circle">
                                <div class="inner">
                                    <p>78%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="quizSection">
                    <h1>Quizzes</h1>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="downLoadArea">
                        <div class="downLoadAreaTitle">
                            <div class="name">
                                <p>Name</p>
                            </div>
                            <div class="author">
                                <p>Author</p>
                            </div>
                            <div class="coruseMark">
                                <p>Course</p>
                            </div>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="downLoadRow">
                            <div class="row"> 
                                <div class="title">
                                    <img class="fileImg" src="Assets/test.png">
                                    <p class="fileName">Networking Test 3</p>
                                </div>
                                <div class="meta">
                                    <div class="rowAuthor">
                                        <p>Oliver Dorrian</p>
                                    </div>
                                    <div class="rowCourse">
                                        <p>Web Dev</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="downLoadRow">
                            <div class="row"> 
                                <div class="title">
                                    <img class="fileImg" src="Assets/test.png">
                                    <p class="fileName">Psychology Monthly Assessment</p>
                                </div>
                                <div class="meta">
                                    <div class="rowAuthor">
                                        <p>Sigmund Freud</p>
                                    </div>
                                    <div class="rowCourse">
                                        <p>Psychology</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="downLoadRow">
                            <div class="row"> 
                                <div class="title">
                                    <img class="fileImg" src="Assets/test.png">
                                    <p class="fileName">Banking In Practice</p>
                                </div>
                                <div class="meta">
                                    <div class="rowAuthor">
                                        <p>Tom Scott</p>
                                    </div>
                                    <div class="rowCourse">
                                        <p>Banking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="downLoadRow">
                            <div class="row"> 
                                <div class="title">
                                    <img class="fileImg" src="Assets/test.png">
                                    <p class="fileName">Web Portfolio 2</p>
                                </div>
                                <div class="meta">
                                    <div class="rowAuthor">
                                        <p>Xander Baker</p>
                                    </div>
                                    <div class="rowCourse">
                                        <p>Web Dev</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <iframe src="https://calendar.google.com/calendar/embed?src=dpqj0f4137m5brcrar1jn1vs64%40group.calendar.google.com&ctz=Europe%2FLondon" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>

        <div id="gradesBig">
        <?php displayGrades($conn, $_SESSION["id"]); ?>
        </div>
        <script src="home.js"></script>
    </body>
</html>