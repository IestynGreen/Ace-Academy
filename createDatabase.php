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
        userType VARCHAR(10) NOT NULL,
        auth INT NOT NULL
        )";
    
    if(mysqli_query($conn, $sql)) echo "<p>Table users created.</p>";
    else die(mysqli_error($conn));

    $hashedPwd = password_hash('Hello', PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(usersName, usersSname, usersEmail, usersPwd, userType, auth)
        VALUES('Xander', 'Baker', 'admin@ace.com', '$hashedPwd', 'Admin', 1)";

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

    $sql = "INSERT INTO posts (id, title, imgName, extension, courseId, content, uploadDate) VALUES
        (2, 'Centering Divs', 'webDeve.jpg', 'jpg', 1, 'In most cases, you can center text horizontally in a div using the text-align property and defining it with the value “center.”\r\n\r\nSay you want to create a div element with a short paragraph inside and a yellow border around it. In your HTML, you’d give the div a class name like “center.” You can then use the CSS selector .center to style it with the border and text-align properties.', '2022-05-20'),
        (3, 'Brain chemistry', 'disctract.jpg', 'jpg', 2, 'Food affects brain chemistry and function. Many such effects involve the blood–brain barrier (BBB), which facilitates the transport of some water-soluble molecules (e.g., glucose, many amino acids), excludes other molecules, and permits diffusion of lipid-soluble molecules. Glucose is the principal energy substrate of brain; ketone bodies are used during starvation. Amino acids are incorporated into proteins and functionally important small molecules (e.g., neurotransmitters). Fatty acids are converted to membrane lipids. Two essential fatty acids have other important functions. Vitamins and minerals enter brain via BBB transporters. Diet affects the brain uptake of many of these nutrients, which often influences brain function.', '2022-05-20'),
        (4, 'Numbers', 'center.jpg', 'jpg', 3, 'A number is a mathematical object used to count, measure, and label. The original examples are the natural numbers 1, 2, 3, 4, and so forth. Numbers can be represented in language with number words. More universally, individual numbers can be represented by symbols, called numerals; for example, \"5\" is a numeral that represents the number five. As only a relatively small number of symbols can be memorized, basic numerals are commonly organized in a numeral system, which is an organized way to represent any number. The most common numeral system is the Hindu–Arabic numeral system, which allows for the representation of any number using a combination of ten fundamental numeric symbols, called digits. In addition to their use in counting and measuring, numerals are often used for labels (as with telephone numbers), for ordering (as with serial numbers), and for codes (as with ISBNs). In common usage, a numeral is not clearly distinguished from the number that it represents. ', '2022-05-20'),
        (5, 'Reports', 'book.jpg', 'jpg', 4, 'While banks have plenty of data to deliver these experiences, most lag their FinTech and Big Tech competitors. The challenge is that it’s hard to get there from where many banks are today. Highlights from the Capgemini and Efma World Retail Banking Report 2022:\r\n\r\nBanks that meet changing customer expectations with personalized experiences that are fun, engaging and omnichannel can increase acquisition, engagement and loyalty and keep pace with agile Fintech competitors.', '2022-05-20')";
    if(mysqli_query($conn, $sql)) echo "<p>Posts populated.</p>";
    else die(mysqli_error($conn));

    mysqli_close($conn);
?>