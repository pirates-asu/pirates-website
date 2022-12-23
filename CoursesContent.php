<?php
// $db = new DB();
require("php/sessions.php");
require("php/database.php");

$db = new DB();
$cid = $_GET["cid"];
#$uid = 31;
$uname = $_SESSION["username"];
$result = mysqli_query($db -> getConnection(), "SELECT cname FROM course WHERE cid = $cid");
$user = mysqli_query($db -> getConnection(), "SELECT uid FROM user WHERE uusername='$uname'");
$enrolled_course = mysqli_query($db -> getConnection(), "SELECT cid FROM enrollment,user WHERE user.uid = enrollment.uid and cid = $cid and uusername = '$uname'");
$videos = mysqli_query($db -> getConnection(), "SELECT vname,vlink FROM video WHERE cid = $cid");

$row1 = mysqli_fetch_array($enrolled_course,MYSQLI_ASSOC);
$cname = mysqli_fetch_array($result,MYSQLI_ASSOC);
$urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
if(is_null($row1)){
  $uid = $urow["uid"];
  $sql = "INSERT INTO enrollment (eid, uid, cid)
  VALUES (NULL, $uid, $cid)";
  mysqli_query($db -> getConnection(), $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CoursesContent.css">
</head>
<body>
<h1 class ="heading"> <?= $cname["cname"]?></h1>
<div class="container">
	<div class="main-video">
      <?php
        $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
        if(is_null($first_video)){
          $first_video["vlink"] = "";
          $first_video["vname"] = "Course Coming Soon";
        }
      ?>
			<iframe width="800em" height="440em" src="<?= $first_video["vlink"]?>"
                loop controls class="mainVideo"
                allow = "accelerometer; autoplay; encrypted-media;"
                allowfullscreen
            ></iframe>
            <h3 class="titleM"><?= $first_video["vname"]?></h3>

    </div>

    <div class="video-list">
        <div class="vid active">
            <iframe width="200" height="100" src="<?= $first_video["vlink"]?>"
            class="list-video"></iframe>
            <h3 class="title"><?= $first_video["vname"]?></h3>

        </div>
        <?php
        for($i=0;$i<mysqli_num_rows($videos)-1;$i++){
          $video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
          echo '<div class="vid">';
          echo '<iframe width="200" height="100" src="',$video["vlink"],'"
          class="list-video"></iframe>';
          echo '<h3 class="title">',$video["vname"],'</h3>';
          echo '</div>';
        }
        ?>
        <!--<div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/U6PSsSM1swQ"
            class="list-video"></iframe>
            <h3 class="title">2) heeeeeeeeh</h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/gzbLODUb1sA"
            class="list-video"></iframe>
            <h3 class="title">3) lol </h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/U6PSsSM1swQ"
            class="list-video"></iframe>
            <h3 class="title">4) Cyberpunk MV</h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/U6PSsSM1swQ"
            class="list-video"></iframe>
            <h3 class="title">5) Cyberpunk MV</h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/U6PSsSM1swQ"
            class="list-video"></iframe>
            <h3 class="title">6) Cyberpunk MV</h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/U6PSsSM1swQ"
            class="list-video"></iframe>
            <h3 class="title">7) Cyberpunk MV</h3>

        </div>
        <div class="vid">
            <iframe width="200" height="100" src="https://www.youtube.com/embed/k8r1uHcjpyY"
            class="list-video"></iframe>
            <h3 class="title">8) Cyberpunk MV</h3>

        </div>-->


    </div>
</div>

<script>
let videoList = document.querySelectorAll('.video-list .vid');

videoList.forEach(video =>{
   video.onclick = () =>{
      videoList.forEach(remove =>{remove.classList.remove('active')});
      video.classList.add('active');
      let src = video.querySelector('.list-video').src;
      let text = video.querySelector('.title').innerHTML;
      document.querySelector('.main-video .mainVideo').src = src;
      //document.querySelector('.main-video .mainVideo').play();
      document.querySelector('.main-video .titleM').innerHTML = text;
   };
});

</script>

</body>
</html>
