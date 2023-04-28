<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECTS</title>
</head>
<body>
    <div id="menu" style="text-align: center; background-color: #ddd; padding: 30px;  border: 1px solid #ddd; margin-bottom: 30px;">
        <style>
        #menu a {
            margin: 35px;
        }
        </style>
        |
        <a href="../">HOME</a> |
        <a href="../students.php">STUDENTS</a> |
        <a href="../subjects.php">SUBJECTS</a> |
    </div>
    <form action="update-subjects.php" method="post">

        <h1>ENTER SUBJECT DETAILS</h1>
        <label for="">
            ENTER SUBJECT CODE:
            <input type="hidden" name="id" value="<?= $_GET['id']?>" required>
            <input type="text" name="code" value="<?= $_GET['code']?>" required>
        </label><br><br>
        <label for="">
            ENTER SUBJECT DESCRIPTION:
            <input type="text" name="description" value="<?= $_GET['description']?>" required>
        </label><br><br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option <?php if($_GET['year'] == '1ST YEAR'){ echo 'selected';} ?> value="1ST YEAR">1ST YEAR</option>
                <option <?php if($_GET['year'] == '2ND YEAR'){ echo 'selected';} ?> value="2ND YEAR">2ND YEAR</option>
                <option <?php if($_GET['year'] == '3RD YEAR'){ echo 'selected';} ?> value="3RD YEAR">3RD YEAR</option>
                <option <?php if($_GET['year'] == '4TH YEAR'){ echo 'selected';} ?> value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br> <br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option <?php if($_GET['course'] == 'BSIT'){ echo 'selected';} ?> value="BSIT">BSIT</option>
                <option <?php if($_GET['course'] == 'BSED'){ echo 'selected';} ?> value="BSED">BSED</option>
                <option <?php if($_GET['course'] == 'BSBA'){ echo 'selected';} ?> value="BSBA">BSBA</option>
                <option <?php if($_GET['course'] == 'BEED'){ echo 'selected';} ?> value="BEED">BEED</option>
            </select>
        </label><br> <br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option <?php if($_GET['semester'] == '1ST'){ echo 'selected';} ?> value="1ST">1ST</option>
                <option <?php if($_GET['semester'] == '2ND'){ echo 'selected';} ?> value="2ND">2ND</option>
            </select>
        </label><hr>
        <button type="submit">Update</button>
    </form>   

    <br>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SUBJECT CODE</th>
                    <th>SUBJECT DESCRIPTION</th>
                    <th>YEAR</th>
                    <th>COURSE</th>
                    <th>SEMESTER</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php   

                    require_once "../connection.php";

                    $sql = "SELECT * FROM subjects";
                    $result = $conn->query($sql);
                    $number = 1;

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) { ?>

                        <tr>
                            <th><?= $number++; ?></th>
                            <th><?= $row["code"] ?></th>
                            <th><?= $row["description"] ?></th>
                            <th><?= $row["year"] ?></th>
                            <th><?= $row["course"] ?></th>
                            <th><?= $row["semester"] ?></th>
                            <th>
                                <a href="subjects/edit-subjects.php?id=<?= $row["id"]?>&code=<?=$row["code"]?>&description=<?=$row["description"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>EDIT</button></a>
                                <a href="subjects/delete-subjects.php?id=<?= $row["id"] ?>"><button>DELETE</button></a>
                            </th>
                        </tr>    

                    <?php
                        }
                    }else{ ?>

                     <td><th colspan="7" text-align="center">No data found</th></td>

                    <?php
                    }

                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>

<br>

