<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>
<body>

    <div id="menu" style="text-align: center; background-color: #ddd; padding: 30px;  border: 1px solid #ddd; margin-bottom: 30px;">
        <style>
        #menu a {
            margin: 34px;
        }
        </style>
        |
        <a href="../">HOME</a> |
        <a href="../students.php">STUDENTS</a> |
        <a href="../subjects.php">SUBJECTS</a> |
    </div>

    <form action="update-students.php" method="POST">
        <h1>ENTER STUDENT DETAILS</h1>
        <label for="">
            ENTER FIRST NAME:
            <input type="hidden" name="id" value="<?= $_GET['id']?>" required>
            <input type="text" name="first_name" value="<?= $_GET['first_name']?>" required>
        </label><br><br>
        <label for="">
            ENTER LAST NAME:
            <input type="text" name="last_name" value="<?= $_GET['last_name']?>" required>
        </label><br><br>
        <div>
            <label for="">GENDER: </label>
            <label for=""> <input type="radio" name="gender" id="" checked  <?php if($_GET['gender'] == 'MALE') echo 'checked';?> Value="MALE">MALE</label>
            <label for=""> <input type="radio" name="gender" id="" <?php if($_GET['gender'] == 'FEMALE') echo 'checked'; ?> Value="FEMALE">FEMALE</label>
        </div><br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option <?php if($_GET['year'] == '1ST YEAR'){ echo 'selected';} ?> value="1ST YEAR">1ST YEAR</option>
                <option <?php if($_GET['year'] == '2ND YEAR'){ echo 'selected';} ?> value="2ND YEAR">2ND YEAR</option>
                <option <?php if($_GET['year'] == '3RD YEAR'){ echo 'selected';} ?> value="3RD YEAR">3RD YEAR</option>
                <option <?php if($_GET['year'] == '4TH YEAR'){ echo 'selected';} ?> value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br><br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option <?php if($_GET['course'] == 'BSIT'){ echo 'selected';} ?> value="BSIT">BSIT</option>
                <option <?php if($_GET['course'] == 'BSED'){ echo 'selected';} ?> value="BSED">BSED</option>
                <option <?php if($_GET['course'] == 'BSBA'){ echo 'selected';} ?> value="BSBA">BSBA</option>
                <option <?php if($_GET['course'] == 'BEED'){ echo 'selected';} ?> value="BEED">BEED</option>
            </select>
        </label><br><br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option <?php if($_GET['semester'] == '1ST'){ echo 'selected';} ?> value="1ST">1ST</option>
                <option <?php if($_GET['semester'] == '2ND'){ echo 'selected';} ?> value="2ND">2ND</option>
            </select>
        </label>
        <hr> <br><br>
        <button type="submit">UPDATE</button>
        <br>
        <br>
    </form>
    <div>
    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>STUDENT NAME</th>
    <th>GENDER</th>
    <th>YEAR</th>
    <th>COURSE</th>
    <th>SEMESTER</th>
    <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
                <?php   

                    require_once "../connection.php";

                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);
                    $number = 1;
                   

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) { ?>

                        <tr>
                            <th><?= $row["id"] ?></th>
                            <th><?= $row["first_name"] . " " . $row["last_name"] ?></th>
                            <th><?= $row["gender"] ?></th>
                            <th><?= $row["year"] ?></th>
                            <th><?= $row["course"] ?></th>
                            <th><?= $row["semester"] ?></th>
                            <th>
                                <a href="students/edit-students.php?id=<?= $row["id"]?>&first_name=<?=$row["first_name"]?>&last_name=<?=$row["last_name"]?>&gender=<?=$row["gender"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>EDIT</button></a>
                                <a href="students/delete-students.php?id=<?= $row["id"] ?>"><button>DELETE</button></a>
                                <a href="student-subjects.php?id=<?= $row["id"]?>&first_name=<?=$row["first_name"]?>&last_name=<?=$row["last_name"]?>&gender=<?=$row["gender"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>ADD SUBJECTS</button></a>
                            </th>
                        </tr>    

                    <?php
                        }
                    }else{ ?>

                     <tr><th colspan ="7" style="text-align:center;">No data found</th></tr>

                    <?php
                    }

                ?>
                
            </tbody>
    </table>
    </div>

    <br>
</body>
</html>