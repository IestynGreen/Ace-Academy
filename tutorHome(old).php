<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    if(!isset($_SESSION["loggedIn"]) || isset($_SESSION["loggedIn"]) != 1){
        header("location: ../index.php?error=notloggedin");
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
                        <p class="courseText">Courses</p>
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
                        <p class="courseText">Settings</p>
                    </div>
                </div>
                <div class="course account">
                    <div class="courseVis">
                        <img src="assets/logout.png">
                        <p class="courseText">Log-out</p>
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
                    <div class="coruseBox wave-no-border">
                        <div class="courseTitleContain">
                            <h1 class="courseTitle">Core 1: <?php echo getCourseName($conn, 1); ?></h1> 
                            <p><?php echo getCourseDesc($conn, 1); ?></p>
                        </div>
                        <div class="courseInformation">
                            <img src="assets/blank-page.png">
                            <p>63</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/test-quiz.png">
                            <p>3</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/icons8-user-30.png">
                            <p>70</p>
                        </div>
                    </div>
                    <div class="coruseBox bluePurple-no-border">             
                        <div class="courseTitleContain">
                            <h1 class="courseTitle">Core 1: <?php echo getCourseName($conn, 2); ?></h1> 
                            <p><?php echo getCourseDesc($conn, 2); ?></p>
                        </div>
                        <div class="courseInformation">
                            <img src="assets/blank-page.png">
                            <p>39</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/test-quiz.png">
                            <p>9</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/icons8-user-30.png">
                            <p>28</p>
                        </div>
                    </div>
                    <div class="coruseBox triangle-no-border">             
                        <div class="courseTitleContain">
                            <h1 class="courseTitle">Core 1: Maths</h1> 
                            <p>The study of such topics as numbers, formulas and shapes.</p>
                        </div>
                        <div class="courseInformation">
                            <img src="assets/blank-page.png">
                            <p>52</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/test-quiz.png">
                            <p>1</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/icons8-user-30.png">
                            <p>3</p>
                        </div>
                    </div>
                    <div class="coruseBox jag-no-border">             
                        <div class="courseTitleContain">
                            <h1 class="courseTitle">Core 1: Banking</h1>
                            <p>The business activity of accepting and safeguarding money.</p>
                        </div>
                        <div class="courseInformation">
                            <img src="assets/blank-page.png">
                            <p>13</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/test-quiz.png">
                            <p>1</p>
                            <hr style="width: 10%; border-radius: 10px; transform: rotate(90deg);", size="1", color=grey>
                            <img src="assets/icons8-user-30.png">
                            <p>98</p>
                        </div>
                    </div>
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
                <div class="quizContainer">
                    <div class="quizBoxTitle">
                        <p>Website Development</p>
                    </div>
                    <div class="rowOfQuizzes">
                        <div class="quizBox">
                            <div class="quizBoxTop bluePurple">
                                <h4>Web Portfolio 1</h4>
                            </div>
                            <div class="quizBoxBottom">
                                <p>Basic web design questions needed for core work</p>
                                <button class="quizTry">Attempt Quiz</button>
                            </div>
                        </div>
                        <div class="quizBox">
                            <div class="quizBoxTop circleBack">
                                <h4>Week 4 Test</h4>
                            </div>
                            <div class="quizBoxBottom">
                                <p>Focusing on how to center a div</p>
                                <button class="quizTry">Attempt Quiz</button>
                            </div>
                        </div>
                        <div class="quizBox">
                            <div class="quizBoxTop triangle">
                                <h4>Half Term Assessment</h4>
                            </div>
                            <div class="quizBoxBottom">
                                <p>Test to be completed over the half term period</p>
                                <button class="quizTry">Attempt Quiz</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quizContainer">
                    <div class="quizBoxTitle">
                        <p>Psychology</p>
                    </div>
                    <div class="rowOfQuizzes">
                        <div class="quizBox">
                            <div class="quizBoxTop wave">
                                <h4>Test For Week 12</h4>
                            </div>
                            <div class="quizBoxBottom">
                                <p>Quiz for Freudian methods and their influences</p>
                                <button class="quizTry">Attempt Quiz</button>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quizContainer">
                    <div class="quizBoxTitle">
                        <p>Banking</p>
                    </div>
                    <div class="rowOfQuizzes">
                        <div class="quizBox">
                            <div class="quizBoxTop jag">
                                <h4>Loan Assessments</h4>
                            </div>
                            <div class="quizBoxBottom">
                                <p>Marked work for testing loan approval rates</p>
                                <button class="quizTry">Attempt Quiz</button>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="calendarBig">
            <div id="callenderContainer">
                <iframe src="https://calendar.google.com/calendar/embed?src=dpqj0f4137m5brcrar1jn1vs64%40group.calendar.google.com&ctz=Europe%2FLondon" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>

        <div id="gradesBig">
            <h4>Website Development</h4>
            <div class="gradesContain">
                <div class="generalInfomation bluePurple">
                    <div class="averageCompletion">
                        <p class="averageCompleteTitle">Average<br>Completion:</p>
                        <div class="progressBarSmall">
                            <div id="progressCircleSmall">
                                <div class="circle">
                                    <div class="inner">
                                        <p>78%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quizTakenContainer">
                        <p>Quizzes Taken: </p>
                        <p class="spaceLeft">4</p>
                    </div>
                    <div class="topScoreContainer">
                        <p>Top Score: </p>
                        <p class="spaceLeft"> 88%</p>
                    </div>
                    <div class="quizzesLeftContainer">
                        <p>Quizzes Left: </p>
                        <p class="spaceLeft">5</p>
                    </div>
                </div>
                <div class="gradesInformation">
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="titleSection">
                        <div class="assementTitle">
                            <p>Assessment Title</p>
                        </div>
                        <div class="gradeTitle">
                            <p>Grade</p>
                        </div>
                        <div class="rangeTitle">
                            <p>Range</p>
                        </div>
                        <div class="percentageTitle">
                            <p>Percentage</p>
                        </div>
                    </div>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="gradesSection">
                        <div class="gradesRow">
                            <p class="assementValue">Web Portfolio 1</p>
                            <p class="gradeValue">77</p>
                            <p class="rangeValue">0-120</p>
                            <p class="percentageValue">64.1%</p>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="gradesRow">
                            <p class="assementValue">Week 4 Test</p>
                            <p class="gradeValue">88</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">88%</p>
                        </div>
                        <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                        <div class="gradesRow">
                            <p class="assementValue">Half Term Test</p>
                            <p class="gradeValue">10</p>
                            <p class="rangeValue">0-25</p>
                            <p class="percentageValue">40%</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Psychology</h4>
            <div class="gradesContain">
                <div class="generalInfomation jag">
                    <div class="averageCompletion">
                        <p class="averageCompleteTitle">Average<br>Completion:</p>
                        <div class="progressBarSmall">
                            <div id="progressCircleSmall">
                                <div class="circle">
                                    <div class="inner">
                                        <p>78%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quizTakenContainer">
                        <p>Quizzes Taken: </p>
                        <p class="spaceLeft">1</p>
                    </div>
                    <div class="topScoreContainer">
                        <p>Top Score: </p>
                        <p class="spaceLeft"> 72.5%</p>
                    </div>
                    <div class="quizzesLeftContainer">
                        <p>Quizzes Left: </p>
                        <p class="spaceLeft">3</p>
                    </div>
                </div>
                <div class="gradesInformation">
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="titleSection">
                        <div class="assementTitle">
                            <p>Assessment Title</p>
                        </div>
                        <div class="gradeTitle">
                            <p>Grade</p>
                        </div>
                        <div class="rangeTitle">
                            <p>Range</p>
                        </div>
                        <div class="percentageTitle">
                            <p>Percentage</p>
                        </div>
                    </div>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="gradesSection">
                        <div class="gradesRow">
                            <p class="assementValue">Standard Analysis Methods</p>
                            <p class="gradeValue">51</p>
                            <p class="rangeValue">0-70</p>
                            <p class="percentageValue">72.8%</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Banking</h4>
            <div class="gradesContain">
                <div class="generalInfomation wave">
                    <div class="averageCompletion">
                        <p class="averageCompleteTitle">Average<br>Completion:</p>
                        <div class="progressBarSmall">
                            <div id="progressCircleSmall">
                                <div class="circle">
                                    <div class="inner">
                                        <p>78%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quizTakenContainer">
                        <p>Quizzes Taken: </p>
                        <p class="spaceLeft">6</p>
                    </div>
                    <div class="topScoreContainer">
                        <p>Top Score: </p>
                        <p class="spaceLeft">92%</p>
                    </div>
                    <div class="quizzesLeftContainer">
                        <p>Quizzes Left: </p>
                        <p class="spaceLeft">1</p>
                    </div>
                </div>
                <div class="gradesInformation">
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="titleSection">
                        <div class="assementTitle">
                            <p>Assessment Title</p>
                        </div>
                        <div class="gradeTitle">
                            <p>Grade</p>
                        </div>
                        <div class="rangeTitle">
                            <p>Range</p>
                        </div>
                        <div class="percentageTitle">
                            <p>Percentage</p>
                        </div>
                    </div>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="gradesSection">
                        <div class="gradesRow">
                            <p class="assementValue">Loan Assessment Methods</p>
                            <p class="gradeValue">92</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">92%</p>
                        </div>
                        <div class="gradesRow">
                            <p class="assementValue">Compound Interest Calculations</p>
                            <p class="gradeValue">74</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">74%</p>
                        </div>
                        <div class="gradesRow">
                            <p class="assementValue">Basic Trading Patterns Analysis</p>
                            <p class="gradeValue">89</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">89%</p>
                        </div>
                        <div class="gradesRow">
                            <p class="assementValue">Advanced Trading Patterns Analysis</p>
                            <p class="gradeValue">67</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">67%</p>
                        </div>
                        <div class="gradesRow">
                            <p class="assementValue">Monthly Assessment</p>
                            <p class="gradeValue">86</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">86.2%</p>
                        </div>
                        <div class="gradesRow">
                            <p class="assementValue">Final Yearly Assessment</p>
                            <p class="gradeValue">84</p>
                            <p class="rangeValue">0-100</p>
                            <p class="percentageValue">84%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="home.js"></script>
    </body>
</html>