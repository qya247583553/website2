<?php
session_start();
if(isset($_POST['Modify'])) {
    $StudentID=$_SESSION["studentID"];
    $StudentEmail=$_POST["StudentEmail"];
    $StudentPassword=$_POST["StudentPassword"];
    $Fist_Name=$_POST["Fist_Name"];
    $Last_Name=$_POST["Last_Name"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "UPDATE studentaccountinformation SET StudentEmail='$StudentEmail',StudentPassword='$StudentPassword',Fist_Name='$Fist_Name',Last_Name='$Last_Name' where StudentID='$StudentID'";
    echo $sql;
    $conn->query($sql);

    $conn->close();
}
header("Location:view students.php");
die();
?>