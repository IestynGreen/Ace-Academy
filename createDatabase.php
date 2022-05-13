<?php
    $conn = mysqli_connect("localhost", "root", "");

    $sql = "CREATE DATABASE IF NOT EXISTS aceBase";

    if(mysqli_query($conn, $sql)) echo "<p>Database aceBase created.</p>";
    else die(mysqli_error($conn));

    $sql = "USE aceBase";

    if(mysqli_query($conn, $sql)) echo "<p>Database aceBase selected.</p>";
    else die(mysqli_error($conn));

    $sql = "CREATE TABLE IF NOT EXISTS users (
        usersId INT AUTO_INCREMENT PRIMARY KEY,
        usersName VARCHAR(50) NOT NULL,
        usersSname VARCHAR(50) NOT NULL,
        usersEmail VARCHAR(100) NOT NULL,
        usersPwd VARCHAR(128) NOT NULL,
        userType VARCHAR(10) NOT NULL
        )";
    
    if(mysqli_query($conn, $sql)) echo "<p>Table users created.</p>";
    else die(mysqli_error($conn));

    $hashedPwd = password_hash('Hello', PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(usersName, usersSname, usersEmail, usersPwd, userType)
        VALUES('Xander', 'Baker', 'xander@email.com', '$hashedPwd', 'Tutor')";

    if(mysqli_query($conn, $sql)) echo "<p>User table populated.</p>";
    else die(mysqli_error($conn));

    $sql = "CREATE TABLE IF NOT EXISTS courses(
        courseId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        name VARCHAR(80) NOT NULL,
        courseDesc text(500) NOT NULL,
        creditValue INT
    );";
    echo "<p>";
    if (mysqli_query($conn, $sql))  echo "Created table courses.";
    else echo "Failed to created table courses:  " . mysqli_error($conn);
    echo "</p>";

    $sql = "INSERT INTO courses(name, courseDesc, creditValue)
        VALUES('Web Dev', 'The basics of web development, the process of creating a website.', 60)";
    if(mysqli_query($conn, $sql)) echo "<p>Web Dev Added.</p>";
    else die(mysqli_error($conn));    

    $sql = "INSERT INTO courses(name, courseDesc, creditValue)
        VALUES('Psychology', 'The study of human thought, behavior, emotion, motivation.', 60)";
    if(mysqli_query($conn, $sql)) echo "<p>Psychology Added.</p>";
    else die(mysqli_error($conn));   

    $sql = "INSERT INTO courses(name, courseDesc, creditValue)
        VALUES('Maths', 'The study of such topics as numbers, formulas and shapes.', 60)";
    if(mysqli_query($conn, $sql)) echo "<p>Maths added.</p>";
    else die(mysqli_error($conn));   

    $sql = "INSERT INTO courses(name, courseDesc, creditValue)
        VALUES('Banking', 'The business activity of accepting and safeguarding money.', 60)";
    if(mysqli_query($conn, $sql)) echo "<p>Banking Added.</p>";
    else die(mysqli_error($conn));   
    
    $sql = "CREATE TABLE IF NOT EXISTS studentsOnCourses(
                usersId INT NOT NULL,
				courseId INT NOT NULL,
				dateEnrolled DATETIME NOT NULL,
                authorised int NOT NULL,
				FOREIGN KEY (usersId) 
					REFERENCES users(usersId)
					ON UPDATE CASCADE ON DELETE RESTRICT,
				FOREIGN KEY (courseId)
					REFERENCES courses(courseId)
					ON UPDATE CASCADE ON DELETE RESTRICT
            );";
    echo "<p>";
    if (mysqli_query($conn, $sql))  echo "Created table studentsOnCourses.";
    else echo "Failed to created table studentsOnCourses:  " . mysqli_error($conn);
    echo "</p>";

    $sql = "CREATE TABLE IF NOT EXISTS resources(
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        extension VARCHAR(6),
        courseId INT NOT NULL,
        uploadDate DATE NOT NULL,
        size INT NOT NULL, 
        fname VARCHAR(255) NOT NULL, 
        sname VARCHAR(255) NOT NULL,
        FOREIGN KEY (courseId) 
            REFERENCES courses(courseId)
            ON UPDATE CASCADE ON DELETE RESTRICT
    )";
    if (mysqli_query($conn, $sql))  echo "Created table resources.";

    $sql = "CREATE TABLE IF NOT EXISTS posts(
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        imgName VARCHAR(255) NOT NULL,
        extension VARCHAR(6),
        courseId INT NOT NULL,
        content TEXT NOT NULL,
        uploadDate DATE NOT NULL,
        FOREIGN KEY (courseId) 
            REFERENCES courses(courseId)
            ON UPDATE CASCADE ON DELETE RESTRICT
    )";
    if (mysqli_query($conn, $sql))  echo "Created table posts.";

    $sql = "CREATE TABLE IF NOT EXISTS quizList (
        quizID INT AUTO_INCREMENT PRIMARY KEY,
        courseID INT NOT NULL,
        quizName VARCHAR(255) NOT NULL
        )";
    
    if(mysqli_query($conn, $sql)) echo "<p>Table quizList created.</p>";
    else die(mysqli_error($conn));
    
    $sql = "CREATE TABLE IF NOT EXISTS quizQA (
        questionID INT AUTO_INCREMENT PRIMARY KEY,
        quizID INT NOT NULL,
        question VARCHAR(255) NOT NULL,
        answer1 VARCHAR(255) NOT NULL,
        answer2 VARCHAR(255) NOT NULL,
        answer3 VARCHAR(255) NOT NULL,
        answer4 VARCHAR(255) NOT NULL
        )";
    
    if(mysqli_query($conn, $sql)) echo "<p>Table quizQA created.</p>";
    else die(mysqli_error($conn));
    
    $sql = "CREATE TABLE IF NOT EXISTS studentGrades (
        score INT NOT NULL,
        quizID INT NOT NULL,
        courseID INT NOT NULL,
        studentID INT NOT NULL
    
        )";
    
    if(mysqli_query($conn, $sql)) echo "<p>Table studentGrades created.</p>";
    else die(mysqli_error($conn));

    mysqli_close($conn);
?>