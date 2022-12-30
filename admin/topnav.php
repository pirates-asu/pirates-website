<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="styles.css">
</head>
<header>
   <?php
   $path = dirname(getcwd(), 1);
   require($path . "/php/admin.php");
   require($path . "/php/sessions.php");
   isloggedin(0);
   if (array_key_exists('log_out', $_POST))
      logout();
   elseif (array_key_exists('remove_video_btn', $_POST))
      header("refresh:0");
   ?>
   <div class="topnav">
   <?php
      if ($link == '1') {
         $_SESSION["username"] = null;
         redirect("/learntoearn/login.php");
      }
      ?>
      <a name="add_course_btn" href="addcourse.php">Add Course </a>
      <a name="remove_course_btn" href="removecourse.php">Remove Course </a>
      <a name="add_video_btn" href="addvideo.php">Add Video </a>
      <a name="remove_video_btn" href="removevideo.php">Remove Video </a>
      <a name="log_out_btn" href="?p=1">Log Out </a>
      <img class="topnav" src="<?php echo $path . "/img/pirates-log-admin.php"; ?>"></img>
   </div>
   <br>
</header>
<html>