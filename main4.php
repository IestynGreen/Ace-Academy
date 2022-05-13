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
        <title>Ace Academy</title>
        <link rel="stylesheet" href="main.css">
        <link rel="icon" href="Assets/favicon.svg">
    </head>
    <body>
        <div class="progress">
        </div>
        <div id="topBar">
            <div id="topBarRight">
                <div id="topBarLinks">
                    <a href="studentHome.php" class="topBarLinksText">Home</a>
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
                    <p id="name">Oliver Dorrian</p>
                    <p class="downArrow" style="margin-left: 1vh;">❯</p>                    
                </div>
                <div id="profileInvis">
                    <a href="settings.php" id="acountLink">My Account</a>
                    <a href="index.php" id="logOut">Log-Out</a>
                </div>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-bottom: 1vh; margin-top: 1vh;", size="1", color=grey>
            
            <!-- This Should be conditional, only loading the stuff if needed, so if the person if subsrivved to the course -->

            <?php
            for($i=1; $i <= 4; $i++){
                if (courseCheck($conn, $i, $_SESSION["id"])){
                    if ($i == 4){
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
        <div id="quickLinks">
            <!-- This is where quick links should go!-->
            <!-- Needs some complex php for it tbh-->
        </div>
        <!-- Depending on which course they selected this should load the mainpage content-->
        <!-- just deleted the div for the previous courses posts, then run the fuction that fills them-->
        <!-- This should be involked by -->

        <div id="space">
            <h1 class="titleStuff">Banking</h1>
            <?php showCoursePage($conn, 4, 'Banking');?>
        </div>        
        <script src="scripts.js"></script>
    </body> 
</html> 