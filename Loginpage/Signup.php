<?php
if(isset($_POST['ADD'])) {
        $StudentEmail=$_POST["Email"];
        $StudentPassword=$_POST["Password"];
        $StudentFirstname=$_POST["firstname"];
        $StudentLastname=$_POST["lastname"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Stores users entered data from form into database
        $sql1 = "INSERT INTO  `allocate system`.studentaccountinformation(StudentEmail,StudentPassword, First_Name, Last_Name) VALUES (
            '".$StudentEmail."',
            '".$StudentPassword."',
            '$StudentFirstname',
            '$StudentLastname') 
            ; ";


        $result1=$conn->multi_query($sql1);


        $conn->close();
         header("Location:../studentpage/ADD STUDENTPROJECTS.html");
//        die();
//    } else {
//        header("Location:../html/Mtfirstpage.html");
//        die();
    }
?>
