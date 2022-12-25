<?php
// $db = new DB();
require("php/sessions.php");
require("php/database.php");

$db = new DB();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CoursesContent.css">
</head>
<body>
<h1 class ="heading"> <?php $db -> ShowCourseName();?></h1>
<div class="container">
	<div class="main-video">
      <?php
        $db -> ShowFirstVid();
      ?>
			<iframe width="800em" height="440em" src="<?= ($db -> ShowFirstVid_link());?>"
                loop controls class="mainVideo"
                allow = "accelerometer; autoplay; encrypted-media;"
                allowfullscreen
            ></iframe>
            <h3 class="titleM"><?= ($db -> ShowFirstVid_name());
            ?></h3>

    </div>

    <div class="video-list">
        <div class="vid active">
            <iframe width="200" height="100" src="<?= ($db -> ShowFirstVid_link());?>"
            class="list-video"></iframe>
            <h3 class="title"><?= ($db -> ShowFirstVid_name())?></h3>

        </div>
        <?php
        $db -> ShowVids();
        ?>
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
