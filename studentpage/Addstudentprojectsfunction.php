<?php
session_start();
if(isset($_POST['ADD'])) {
        $StudentID=$_SESSION["StudentID"];
        $StudentEmail=$_POST["StudentEmail"];
        $StudentProjectName=$_POST["StudentProjectName"];
        $StudentProjectInfo=$_POST["StudentProjectInfo"];
        $Status=0;

        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Stores users entered data from form into database
        $sql = "INSERT INTO `allocate system`.studentprojects (studentid, studentemail, studentprojectname, studentprojectinfo,Status) VALUES (
            '".$StudentID."',
            '".$StudentEmail."',
            '".$StudentProjectName."',
            '$StudentProjectInfo',
            '$Status')
            ; ";

        $result=$conn->multi_query($sql);

        $conn->close();
         header("Location:view student projects.php");
//        die();
//    } else {
//        header("Location:../html/Mtfirstpage.html");
//        die();
    }
?>
