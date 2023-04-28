<?php

require_once "../connection.php";

$sql = "UPDATE students SET first_name='".$_POST['first_name']."',last_name='".$_POST['last_name']."',gender='".$_POST['gender']."',year='".$_POST['year']."',semester='".$_POST['semester']."',course='".$_POST['course']."' WHERE id=" . $_POST['id'];

if($conn->query($sql)){
    header("Location: ../students.php");

}

else{
    die("Something wrong");
}


?>