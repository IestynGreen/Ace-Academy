<?php
    session_start();
    session_destroy();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    
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
        <meta name="robots" content="index, follow">
        <title>Ace Academy</title>
        <link rel="stylesheet" href="index.css">
        <link rel="icon" href="Assets/favicon.svg">
    </head>
    <body id="appBody">
        <div id="letsChat">            
            <img src="Assets/chat.png">
            <h1>Let's Chat</h1>
        </div>
        <div id="loginOverlay">
            <h1 id="xSymbol">✕</h1>
            
            <div class="loginBox" id="login">
            <form id="formBox" action="includes/login.inc.php" method="post">
                <h1>Login</h1>
                <h2 class="singUpText">New to the site?<span id="signUpLoad"> Sign Up</span></h2>
                <h2 class="Lable">Email</h2>
                <input class="inputThing" type="text" name="email"></input>
                <h2 class="Lable">Password</h2>
                <input class="inputThing" type="password" name="pwd"></input>
                <h2 id="forgotPassword">Forgot Password?</h2>
                <input class="buttonPress" type="submit" value="Login" name="submit"></input>
            </form>
            </div>

            
            <div class="loginBox" id="signUp">
            <form id="formBox" action="includes/signup.inc.php" method="post">
                <h1>SignUp</h1>
                <h2 class="singUpText">Already have an account? <span id="loginLoad">Login</span></h2>
                <h2 class="Lable">First Name</h2>
                <input class="inputThing" type="text" name="name"></input>
                <h2 class="Lable">Last Name</h2>
                <input class="inputThing" type="text" name="sname" ></input>
                <h2 class="Lable">Email</h2>
                <input class="inputThing" type="text" name="email"></input>
                <h2 class="Lable">Password</h2>
                <input class="inputThing" type="password" name="pwd"></input>
                <h2 class="Lable">Repeat Password</h2>
                <input class="inputThing" type="password" name="pwdrepeat"></input>
                <h2 class="Lable">Are you a Student or a Tutor?</h2>
                <select id ="typeSelect" name="type">
                    <option value="Student">Student</option>
                    <option value="Tutor" onselect="hideCourses">Tutor</option>
                </select>
                <span id="courseSelect">
                <h2 class="Lable">Course Enrollment</h2>
                <div class="radioFlex">
                    <label class="flexLable" for="course1"><?php echo getCourseName($conn, 1); ?>
                        <input class="radioBut" type="checkbox" id="course1" name="course1" value="1">
                    </label>
                    
                    <label class="flexLable" for="course2"><?php echo getCourseName($conn, 2); ?>
                        <input class="radioBut" type="checkbox" id="course2" name="course2" value="2">
                    </label>

                    
                    <label class="flexLable" for="course3"><?php echo getCourseName($conn, 3); ?>
                        <input class="radioBut" type="checkbox" id="course3" name="course3" value="3">
                    </label>

                    <label class="flexLable" for="course4"><?php echo getCourseName($conn, 4); ?>
                        <input class="radioBut" type="checkbox" id="course4" name="course4" value="4">
                    </label>                 
                </div>
                </span>
                <h2 id="forgotPassword">Forgot Password?</h2>
                <input class="buttonPress" type="submit" value="Sign Up" name="submit"></input>
            </form>
            </div>
        </div>
        <div id="landingPageImg">
        </div>
        <div id="topBar">
            <div id="topBarLeft">
                <div id="topBarTitle">
                    <h1>Ace <b>Academy</b></h1>
                </div>
            </div>
            <div id="topBarRight">
                <div id="topBarLinks">
                    <h3 class="topBarLinksText activeLink">About Us</h3>
                    <h3 class="topBarLinksText">Blog</h3>
                    <h3 class="topBarLinksText">Partners</h3>
                    <h3 class="topBarLinksText">Contact Us</h3>
                    <div id="topBarLogin">
                        <img alt="user" src="assets/user (1).png">
                        <h3>Login</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="landingPage">
            
            <div id="mainBody">
                 <div id="mainBodyIntro">
                    <h1 id="mainBodyIntroText">Welcome to</h1>
                 </div>
                <div id="mainBodyTitle">
                    <h1 id="mainBodyTitleText">Ace Academy</h1>
                </div> 
                <div id="mainBodyCompText">
                    <p>Start Learning Today</p>
                </div>
            </div>
        </div>
        <div id="articles">
            <div id="articleSplitCointain">
                <div id="articleSplitCointainLeft">
                    <img src="Assets/stairs.jpg">
                    <div id="fakeArticle">
                        <h1>
                            Learning at different levels
                        </h1>
                        <h2>
                            The consequences of a more adaptive learning style can be revolutionary
                            whilst understanding how to learn leads to better outcomes of individuals...
                        </h2>
                    </div>
                </div>
                <div id="articleSplitCointainRight">

                    <div id="articleSplitEqual">
                        <h1>About Us</h1>
                        <hr style="width: 30%; margin-right: 70%; border-radius: 10px;", size="4", color=#FA6B75>
                        <br>
                        <p class="aboutUsText">
                            Ace Academy is a modern work environment for modern learning.
                            We've found that content that is easily accessible, readable, 
                            and adaptable is perfect for online learning.
                        </p>
                        <p class="aboutUsText">
                            Through a platform that both teachers and students can use
                            we have set out to make the ideal learning experience. 
                        </p>
                        <p class="aboutUsText">
                            Powering hundreds of thousands of learning environments globally, Ace is trusted by institutions and organizations large and small. 
                            Our worldwide user numbers of more than 213 million users across both academic and enterprise level usage.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="blog">
            <h1 id="blogTitle">Recent Posts</h1>
            <hr style="width: 10%; margin-left: 6%;", size="7", color=#FA6B75>
            <div id="listOfBlogs">
                <div class="blogBox">
                    <img class="blogImg" src="Assets/classRoom.jpg">
                    <div class="blogTextArea"> 
                        <h1>The Compromise Between Overcrowding And Education For All</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 56 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 11 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blogBox">
                    <img class="blogImg" src="Assets/disctract.jpg">
                    <div class="blogTextArea"> 
                        <h1>Learning Environments For Distracted Learners</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 72 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 45 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blogBox">
                    <img class="blogImg" src="Assets/book.jpg">
                    <div class="blogTextArea"> 
                        <h1>Links Between Early Reading And High Academic Achievement</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 190 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 21 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blogBox">
                    <img class="blogImg" src="Assets/motter.jpg">
                    <div class="blogTextArea"> 
                        <h1>Motor Skills And Their Relationship With Brain development</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 19 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 4 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blogBox">
                    <img class="blogImg" src="Assets/woman.jpg">
                    <div class="blogTextArea"> 
                        <h1>The Stepping Stones Of Getting More Women In Tech</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 300 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 40 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blogBox">
                    <img class="blogImg" src="Assets/dog.jpg">
                    <div class="blogTextArea"> 
                        <h1>Emotional Support Animals, Fad Or First Choice Solution?</h1>
                        <hr style="width: 90%; margin-left: 5%;", size="0.5", color=#ADADAD>
                        <div class="blogInfo">
                            <div class="blogInfoLeft">
                                <h3> 760 </h3>
                                <img src="Assets/show.png">
                            </div>
                            <div class="blogInfoLeft">
                                <h3> 183 </h3>
                                <img src="Assets/chat.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contactUs">
            <div id="contactUsCenterBox">
                <div id="contactUsTitleBox">
                    <h1>Want to contact us?</h1>
                    <h3>Enter your email bellow</h3>
                </div>
                <div id="contactUsInput">
                    <h2 class="Lable">Email</h2>
                    <div id="inputRow">
                        <input class="inputThing" type="text" id="contactInput"></input>
                        <button type="button" id="buttonStuff">Submit</button>
                    </div>
                </div>
                <div id="socialImgs">
                    <img src="Assets/twitter.png">
                    <img src="Assets/facebook.png">
                    <img src="Assets/linkedin.png">
                </div>
                <div id="copyright">
                    <h4>© 2023 By Ace Academy. Designed by NetWorms</h4>
                </div>
            </div>
        </div>
        <script src="index.js"></script>
    </body>
</html>