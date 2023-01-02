<?php require("topnav.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $removevideotitle; ?></title>
</head>
<header>
</header>

<body>
    <div class="container">
        <br>
        <form action="removevideo.php" method="POST">

            <label><?php echo $selectvideoremove; ?></label>
            <br>
            <select class="mainselection" name="videos">
                <?php
                $arr_videos = $db->getList(1);
                foreach ($arr_videos as $avideo):
                ?>

                <option value="<?php echo $avideo[0]; ?>">
                    <?php echo $avideo[1]; ?>
                </option>

                <?php endforeach; ?>
            </select>

            <input class="btn-default" type="submit" value="Remove Video" name="remove_video">

        </form>

    </div>
</body>

</html>