<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");

    if($_SESSION["type"] == "Tutor"){
        header("location: tutorSettings.php");
    }

    if($_SESSION["type"] == "Student"){
        header("location: home.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tutor Admin</title>
  <link rel="stylesheet" href="styling/temp.css">
</head>
<body>
    <div id="sideBar">
        <div id="titleSet">
            <h6>Tutor Page ⚙️</h6>
        </div>
        <div id="lastList" class="course">
            <div class="courseVis">
                <a class="courseText" id="passwordClick" href="home.php">Log-Out</a>
            </div>
        </div>
    </div>
    <div class="mainContent">
        <div class="titleBit blob">
            <p><b>Authorize Users</b></p>
        </div>
        <div class="main">
            <?php authUsers($conn); ?>
            <?php authUsersForm($conn); ?>
        </div> 
    </div>

  <script src="js/scripts.js"></script>
</body>
</html>

