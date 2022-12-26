<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video</title>
</head>
<header>
    <?php require "topnav.php"; ?>
</header>

<body>
    <?php
    $c_addcourse = "";
    $c_removecourse = "";
    $c_addvideo = "active";
    $c_removevideo = "";
    ?>
    <div class="container">
        <br>
        <form action="addvideo.php" method="POST">

            <label>Video Name</label> <input type="text" name="video_name" placeholder="Video Name"><br>

            <label>Video Link</label> <input type="text" name="video_link" placeholder="Video Link"><br>

            <label>Add to Course</label>
            <br>
            <select name="course_with_vid" : class="mainselection">
                <?php $arr_courses = $db->getList(0);
                foreach ($arr_courses as $acourse): ?>

                <option value="<?php echo $acourse[0]; ?>">
                    <?php echo $acourse[1]; ?>
                </option>

                <?php endforeach; ?>
            </select>
            <br>

            <input class="btn-default" type="submit" value="Add Video" name="add_video">

        </form>

    </div>
</body>

</html>