<?php
if(isset($_POST['delete'])) {
        $idd=$_POST["delete"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Delete selected student from database
        $sql = "DELETE FROM `allocate system`.supervisorprojects WHERE SupID='$idd'";
        echo $sql;
        $conn->multi_query($sql);
        
        $conn->close();
        header("Location:Supervsior-View-Their-Projects.php");
        die();
    } else {
        header("Location:Supervsior-View-Their-Projects.php");
        die();
    }
?>