<?php require("topnav.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $addcoursetitle; ?></title>
</head>
<header>

</header>

<body>
    <div class="container">
        <form action="addcourse.php" method="POST">
            <br>
            <label><?php echo $coursename; ?></label> <input type="text" name="course_name" placeholder="<?php echo $coursename; ?>" required><br>
            <br>
            <label><?php echo $courseauthor; ?></label> <input type="text" name="course_author" placeholder="<?php echo $courseauthor; ?>"><br>
            <br>
            <label><?php echo $coursedescription; ?></label> <input type="text" name="course_description" placeholder="<?php echo $coursedescription; ?>" required><br>
            <br>
            <label><?php echo $imagelink; ?></label> <input type="text" name="image_link" placeholder="<?php echo $imagelink; ?>" required><br>
            <br>
            <label><?php echo $coursetrack; ?></label>
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
