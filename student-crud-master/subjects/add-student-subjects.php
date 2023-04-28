<?php

    require_once "../connection.php";

    $student_id = $_POST['student_id'];
    
    foreach ($_POST['subject_id'] as $subject ) {

        $sql = "INSERT INTO student_subjects (student_id, subject_id) VALUES($student_id, $subject)";
        $query = $conn->query($sql); 
    }

    if($query)
    {
        header("Location: ../student.php");

        
    }else
    {
        die("Something wrong");
    }

    ?>



  