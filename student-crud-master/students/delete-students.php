<?php

require_once "../connection.php";

$sql = "DELETE FROM students WHERE id=" . $_GET['id'];

if($conn->query($sql)){
    header("Location: ../students.php");

}

else{
    die("Something wrong");
}


?>