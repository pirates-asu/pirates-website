<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<header>
    <?php require("topnav.php"); ?>
</header>

<body>
    <?php
    $c_addcourse = "active";
    $c_removecourse = "";
    $c_addvideo = "";
    $c_removevideo = "";
    ?>
    <div class="container">
        <form action="addcourse.php" method="POST">
            <br>
            <label>Course Name</label> <input type="text" name="course_name" placeholder="Course Name" required><br>
            <br>
            <label>Course Author</label> <input type="text" name="course_author" placeholder="Course Author"><br>
            <br>
            <label>Course Link</label> <input type="text" name="course_link" placeholder="Course Link" required><br>
            <br>
            <input class="btn-default" type="submit" value="Add Course" name="add_course">
        </form>

    </div>
</body>

</html>