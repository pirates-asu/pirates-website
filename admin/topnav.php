<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="../styles/admin.css">
</head>
<header>
   <?php
   $path = dirname(getcwd(), 1);
   require("../php/admin.php");
   require("../php/sessions.php");
   require("../php/strings.php");
   isloggedin(0);
   if (array_key_exists('log_out', $_POST))
   echo "";
      //logout();
   elseif (array_key_exists('remove_video_btn', $_POST))
      header("refresh:0");
   ?>
   <div class="topnav">
      <a name="add_course_btn" href="addcourse.php"><?php echo $addcourse; ?></a>
      <a name="remove_course_btn" href="removecourse.php"><?php echo $removecourse; ?></a>
      <a name="add_video_btn" href="addvideo.php"><?php echo $addvideo; ?></a>
      <a name="remove_video_btn" href="removevideo.php"><?php echo $removevideo; ?></a>
      <a name="log_out_btn" href="../logout.php"><?php echo $logout; ?></a>
      <img class="topnav" src="../images/pirates-log-admin.png"></img>
   </div>
   <br>
</header>
<html>