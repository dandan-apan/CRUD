<?php

    require_once "../connection.php";

    
       

        

   
        $sql = "UPDATE subjects SET code = '".$_POST['code']."', description = '".$_POST['description']."',  year = '".$_POST['year']."', course = '".$_POST['course']."', semester = '".$_POST['semester']."'
        WHERE id = " . $_POST['id'];

        
        

        if($conn->query($sql))
        {
            header("Location: ../subjects.php");
        }else
        {
            die("something went wrong");
        }

?>
