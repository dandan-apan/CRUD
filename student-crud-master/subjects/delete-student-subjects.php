<?php

    require_once "../connection.php";
    $student_id = $_POST['student_id'];

    foreach ($_POST['subject_id'] as $subject ) {

        $sql = "DELETE FROM student_subjects WHERE student_id =  $student_id AND subject_id ='$subject' ";
        $query = $conn->query($sql); 
    }

    if($query)
    {
        header("Location: ../students.php");

        
    }else
    {
        die("Something wrong");
    }
    

    ?>