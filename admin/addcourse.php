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
    <div class="container">
        <form action="addcourse.php" method="POST">
            <br>
            <label>Course Name</label> <input type="text" name="course_name" placeholder="Course Name" required><br>
            <br>
            <label>Course Author</label> <input type="text" name="course_author" placeholder="Course Author"><br>
            <br>
            <label>Course Description</label> <input type="text" name="course_description" placeholder="Course Description" required><br>
            <br>
            <label>Course Link</label> <input type="text" name="course_link" placeholder="Course Link" required><br>
            <br>
            <label>Image Link</label> <input type="text" name="image_link" placeholder="Image Link" required><br>
            <br>
            <label>Course Track</label>
            <select name="course_track" : class="mainselection">
                <?php $arr_tracks = $db->getTracks();
                foreach ($arr_tracks as $atrack): ?>

                <option value="<?php echo $atrack[0]; ?>">
                    <?php echo $atrack[1]; ?>
                </option>

                <?php endforeach; ?>
            </select>
            <br>
            <input class="btn-default" type="submit" value="Add Course" name="add_course">
        </form>

    </div>
</body>

</html>