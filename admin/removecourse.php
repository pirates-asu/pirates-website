<?php require("topnav.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $removecoursetitle; ?></title>
</head>
<header>

</header>

<body>
    <div class="container">
        <form action="removecourse.php" method="POST">
            <br>
            <label><?php echo $selectcourseremove; ?></label>
            <br>
            <select class="mainselection" name="courses">
                <?php $arr_courses = $db->getList(0);
                foreach ($arr_courses as $acourse): ?>

                <option value="<?php echo $acourse[0]; ?>">
                    <?php echo $acourse[1]; ?>
                </option>

                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <input class="btn-default" type="submit" value="Remove Course" name="remove_course">
        </form>
    </div>
</body>

</html>