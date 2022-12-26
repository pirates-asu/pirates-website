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
      $link = $_GET['p'];
      if ($link == '1') {
         $ac1 = "active";
         $ac2 = "";
         $ac3 = "";
         $ac4 = "";
      }
      if ($link == '2') {
         $ac1 = "";
         $ac2 = "active";
         $ac3 = "";
         $ac4 = "";
      }
      if ($link == '3') {
         $ac1 = "";
         $ac2 = "";
         $ac3 = "active";
         $ac4 = "";
      }
      if ($link == '4') {
         $ac1 = "";
         $ac2 = "";
         $ac3 = "";
         $ac4 = "active";
      }
      if ($link == '5') {
         $_SESSION["username"] = null;
         redirect("/learntoearn/login.php");
      }
      ?>
      <a name="add_course_btn" href="addcourse.php?p=1" class="<?php echo $ac1; ?>">Add Course </a>
      <a name="remove_course_btn" href="removecourse.php?p=2" class="<?php echo $ac2; ?>">Remove Course </a>
      <a name="add_video_btn" href="addvideo.php?p=3" class="<?php echo $ac3; ?>">Add Video </a>
      <a name="remove_video_btn" href="removevideo.php?p=4" class="<?php echo $ac4; ?>">Remove Video </a>
      <a name="log_out_btn" href="?p=5">Log Out </a>
      <img class="topnav" src="<?php echo $path . "/img/pirates-log-admin.php"; ?>"></img>
   </div>
   <br>
</header>
<html>