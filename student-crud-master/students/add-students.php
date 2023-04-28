<?php

require_once "../connection.php";

$sql = "INSERT INTO students (first_name,last_name,gender,year,semester,course) VALUES('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['gender']."','".$_POST['year']."','".$_POST['semester']."','".$_POST['course']."')";

if($conn->query($sql)){
    header("Location: ../students.php");

}

else{
    die("Something wrong");
}


?>