<?php require("topnav.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $addvideotitle; ?></title>
</head>
<header>
</header>

<body>
    <div class="container">
        <br>
        <form action="addvideo.php" method="POST">

            <label><?php echo $videoname; ?></label> <input type="text" name="video_name" placeholder="<?php echo $videoname; ?>"><br>

            <label><?php echo $videolink; ?></label> <input type="text" name="video_link" placeholder="<?php echo $videolink; ?>"><br>

            <label><?php echo $addtocourse; ?></label>
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