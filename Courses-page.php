<?php
require("php/sessions.php");
require("php/database.php");

$db = new DB();
$pid = $_GET["pid"];
#$uid = 31;


if(isset($_SESSION["username"])){
  $uname = $_SESSION["username"];
  $user = mysqli_query($db -> getConnection(), "SELECT uid FROM user WHERE uusername='$uname'");
  $urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
  $uid = $urow["uid"];

  $enrolled_course = mysqli_query($db -> getConnection(), "SELECT enrollment.cid FROM course,enrollment,user WHERE user.uid = enrollment.uid and enrollment.cid = course.cid and pid = $pid and user.uusername = '$uname'");
}

$result = mysqli_query($db -> getConnection(), "SELECT cid,cname,cdescription,clink,imglink FROM course WHERE pid = $pid");

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Jav​a, Python​, ​CSS, ​SQL">
    <meta name="description" content="">
    <title>Courses-page</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Courses-page.css" media="screen">
    <link rel="stylesheet" href="nav-bar.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i">
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Pirates_log.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Courses-page">
  <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en">
    <?php include("nav-bar.php");?>
    <section class="u-clearfix u-gradient u-section-1" id="sec-7fc4">
        <?php
        for($i=0;$i<mysqli_num_rows($result);$i++){
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          if(isset($_SESSION["username"])){
            $row1 = mysqli_fetch_array($enrolled_course,MYSQLI_ASSOC);
          }else{
            $row1 = NULL;
          }

          if($i%2 == 0){
            echo '<div class="box">';
          }else{
            echo '<div class="rbox">';
          }
          echo "<img src=\"",$row["imglink"],'"';
          if($i%2 == 0){
            echo 'style="height:300px;width:470px;margin-left:10em;">';
          }else{
            echo 'style="height:300px;width:470px;margin-right:10em;">';
          }
          echo '<div class="txtbox">';
          echo '<div class="desc">';
          echo ucfirst($row["cname"]);
          echo '</div>';
          echo '<div class="desc1">';
          echo $row["cdescription"];
          echo '</div>';
          echo '<div class="butbox">';
          if(isset($_SESSION["username"])){
            echo '<a href="CoursesContent.php?pid=',$pid,'&cid=',$row["cid"],'" class="button button1" target="_blank">';
            if(is_null($row1)){
              echo 'ENROLL NOW';
            }else{
              echo 'LEARN ', strtoupper($row["cname"]);
            }
          }else{
            echo '<a href="login.php" class="button button1">';
            echo 'ENROLL NOW';
          }

          echo '</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        mysqli_free_result($result);
        if(isset($_SESSION["username"])){
          mysqli_free_result($enrolled_course);
        }

        #mysqli_close($mysqli);
        for($i=0;$i<6;$i++){
          echo '</div>';
        }
        ?>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-6e71"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"> Address: Faculty of Engineering, Ain Shams University</p>
      </div></footer>

</body></html>
