<?php
require("php/sessions.php");
require("php/database.php");
require("php/strings.php");
$db = new DB();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Jav​a, Python​, ​CSS, ​SQL">
    <meta name="description" content="">
    <title><?php echo $coursespages; ?></title>
    <link rel="stylesheet" href="styles/nicepage.css" media="screen">
    <link rel="stylesheet" href="styles/courses.css" media="screen">
    <link rel="stylesheet" href="styles/navbar.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i">
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Pirates_log.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="courses">
  <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en">
    <?php include("navbar.php");?>
    <section class="u-clearfix u-gradient u-section-1" id="sec-7fc4">
        <?php
        
        $query = $db -> showCourses();
        for($i=0;$i<mysqli_num_rows($query["result"]);$i++){
          $row = mysqli_fetch_array($query["result"],MYSQLI_ASSOC);
      
          if(isset($_SESSION["username"])){
            $row1 = mysqli_fetch_array($query["enrolled_course"],MYSQLI_ASSOC);
          }else{
            $row1 = NULL;
          }
      
          if($i%2 == 0){
            echo '<div class="box">';
            echo "<img src=\"",$row["imglink"],'"';
            echo 'style="height:300px;width:470px;margin-left:10em;">';
          }else{
            echo '<div class="rbox">';
            echo "<img src=\"",$row["imglink"],'"';
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
            if(is_null($row1)){
              echo '<a href="watch.php?pid=',$query["pid"],'&cid=',$row["cid"],'" class="button button1">';
              echo $enrollnow;
            }else{
              echo '<a href="watch.php?pid=',$query["pid"],'&cid=',$row["cid"],'" class="button button1" target="_blank">';
              echo $showlearn," ",ucfirst($row["cname"]);
            }
          }else{
            echo '<a href="login.php" class="button button1">';
            echo $enrollnow;
          }
          echo '</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        mysqli_free_result($query["result"]);
        if(isset($_SESSION["username"])){
          mysqli_free_result($query["enrolled_course"]);
        }
      
        for($i=0;$i<6;$i++){
          echo '</div>';
        }
        ?>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-6e71"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"> Address: Faculty of Engineering, Ain Shams University</p>
      </div></footer>

</body></html>
