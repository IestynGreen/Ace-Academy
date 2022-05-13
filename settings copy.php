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
        <title>Settings</title>
        <link rel="stylesheet" href="settings.css">
        <link rel="icon" href="assets/favicon.svg">
    </head>
    <body id="appBody">
        <div id="sideBar">
            <div id="titleSet">
                <h6>Settings ⚙️</h6>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="accountClick" >Account</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="courseClick">Courses</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="passwordClick">Password</p>
                </div>
            </div>
            <div id="lastList" class="course">
                <div class="courseVis">
                    <a class="courseText" id="passwordClick" href="studentHome.php">Home</a>
                </div>
            </div>
        </div>
        <div class="mainContent" id="account">
            <div class="titleBit blob">
                <p><b>Account</b></p>
            </div>
            <div class="main">
                <form id="formBox" action="includes/changeName.inc.php" method="post">
                    <h2>Change Name</h2><br>
                    <h3 class="Lable">Forename</h3> <br>
                    <input class="inputThing" type="text" name="name"></input><br>
                    <h3 class="Lable">Surname</h3><br>
                    <input class="inputThing" type="text" name="sName"></input><br>
                    <input class="buttonPress" type="submit" value="Login" name="submit"></input>
                </form>
            </div> 
        </div>
        <div class="mainContent" id="courses">
            <div class="titleBit blob">
                <p><b>Courses</b></p>
            </div>
            <div class="main">
                <div class="mainLeft">
                    <?php
                    if (isset($_POST["courseId"])) {
                        
                        $courseId = $_POST["courseId"];
                        courseEnrol($conn, $courseId, $_SESSION["id"]);
                        header("location: settings.php");

                    }
                    $count = 0;
                    for($i = 1; $i <= 4; $i++){
                        $userId = $_SESSION["id"];
                        $sql = "SELECT * FROM studentsOnCourses WHERE courseId ='$i' AND usersId = '$userId'";
                        $data = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($data)==0){
                            $count ++;
                            $sql = "SELECT * FROM courses WHERE courseId='$i'";
                            $data = mysqli_query($conn, $sql);
                            $numRows = mysqli_num_rows($data);
                            if ($numRows > 0) {
                                while ($row = mysqli_fetch_array($data)) {
                                    $courseName = $row["name"];

                                    echo "<h2>$courseName</h2>";
                                    echo "<form method='post' action=''>";
                                    echo "<input type='hidden' name='courseId' value='$i'/>";
                                    echo "<input type='submit' value='ENROL'>";
                                    echo "</form>";    
                                }
                            }
                        }
                    }
                    if($count == 0){
                        echo "<h2> You are already enlisted on all courses!</h2>";
                    }
                        
                    ?>
                </div>
            </div> 
        </div>
        <div class="mainContent" id="password">
            <div class="titleBit blob">
                <p><b>Change Password</b></p>
            </div>
            <div class="main">
                <form id="formBox" action="includes/changePass.inc.php" method="post">
                    <h3 class="Lable">Current Password</h3>
                    <input class="inputThing" type="text" name="curPwd"></input>
                    <h3 class="Lable">New Password</h3>
                    <input class="inputThing" type="text" name="newPwd"></input>
                    <h3 class="Lable">New Password Repeat</h3>
                    <input class="inputThing" type="text" name="newPwdR"></input>
                    <input class="buttonPress" type="submit" value="Login" name="submit"></input>
                </form>
            </div> 
        </div>
        <script src="settings.js"></script>
    </body>
</html>