<?php

require_once "../connection.php";


        $sql = "DELETE FROM subjects WHERE id = " . $_GET['id'];
        

        if($conn->query($sql))
        {
            header("Location: ../subjects.php");
        }else
        {
            die("something went wrong");
        }

?>