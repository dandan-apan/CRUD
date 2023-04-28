<?php

require_once "../connection.php";

      

        $sql = "INSERT INTO subjects(code, description, year, course, semester)
        VALUES('".$_POST['code']."', '".$_POST['description']."', '".$_POST['year']."', '".$_POST['course']."', '".$_POST['semester']."')";
        

        if($conn->query($sql))
        {
            header("Location: ../subjects.php");
        }else
        {
            die("something went wrong");
        }

?>