<?php
require("php/sessions.php");
require("php/database.php");

$db = new DB();
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
        $db -> ShowCourses();
        ?>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-6e71"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"> Address: Faculty of Engineering, Ain Shams University</p>
      </div></footer>

</body></html>
