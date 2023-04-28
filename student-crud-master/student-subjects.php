<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>
<body>
<?php include_once "menu.php"; ?>
    <div>
    STUDENT: <?= $_GET['first_name'] . " " . $_GET['last_name']?> <br> <br>
    YEAR LEVEL: <?= $_GET['year']?> <br> <br>
    COURSE: <?= $_GET['course']?> <br> <br>
    SEMESTER: <?= $_GET['semester']?> <br> <br>
    CURRENT SUBJECTS: <br>
    <form action="subjects/delete-student-subjects.php" method="POST">
        <br>
    <table border="1">
    <thead>
    <tr>
    <th>#</th>
    <th>SUBJECT CODE</th>
    <th>SUBJECT DESCRIPTION</th>
    
    </tr>
    </thead>
    <tbody>

    <?php
        

        require_once "connection.php";
        
        $first_name  = $_GET['first_name'];
        $last_name  = $_GET['last_name'];
        $gender  = $_GET['gender'];
        $year  = $_GET['year'];
        $course  = $_GET['course'];
        $semester  = $_GET['semester'];
        $sql = "SELECT subjects.* FROM student_subjects LEFT JOIN subjects ON student_subjects.subject_id = subjects.id WHERE student_id = '".$_GET['id']."'";
        $result = $conn->query($sql);

        

        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) { ?>
                
                <tr>
                    
                
                <input type="text" name="student_id" value="<?php echo $row['id'] ?>">
                <td><input type="checkbox" name="subject_id[]" value="<?php echo $row['id'] ?> "></td>
                <th><?= $row["code"] ?></th>
                <th><?= $row["description"] ?></th>
                </tr>   
            <?php
            }
        }else{ ?>

            <tr><th colspan ="3" style="text-align:center;">No data found</th></tr>

        <?php
        }       
    ?>





    </tbody>
    </table>
    <br>
    
    <button>DELETE CHECKED SUBJECTS</button>

    </form>
    <br>
    <hr>
    <br>
    AVAILABLE SUBJECTS: 
    <br><br>
    <form action="subjects/delete-student-subjects.php" method="POST">
    <table border="1">
    <thead>
    <tr>
    <th>#</th>
    <th>SUBJECT CODE</th>
    <th>SUBJECT DESCRIPTION</th>
    </tr>
    </thead>
    <tbody>


    <?php

        require_once "connection.php";

        $sql = "SELECT * FROM subjects WHERE year = '".$_GET['year']."' && course = '".$_GET['course']."' && semester = '".$_GET['semester']."' AND id NOT IN (SELECT subject_id FROM student_subjects WHERE student_id = '".$_GET['id']."')";
        $result = $conn->query($sql);
        $result_num = mysqli_num_rows($result);

        $student_id = $_GET['id'];

        if ($result_num > 0) 
        {
            while ($row = $result->fetch_assoc()) { ?>
                
                <tr>
                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                <td><input type="checkbox" name="subject_id[]"  value="<?php echo $row['id']; ?>"></td>
                
                <th><?= $row["code"] ?></th>
                <th><?= $row["description"] ?></th>
                </tr>   
            <?php
            }
        }else{ ?>

        <tr><th colspan ="3" style="text-align:center;">No data found</th></tr>

        <?php
        }       
    ?>



    </tbody>
    </table>

    <br><br>
    
    <button>ADD CHECKED SUBJECTS</button>
    </form>
    </div>
</body>
</html>