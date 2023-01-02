<?php
// $db = new DB();
require("php/sessions.php");
require("php/strings.php");
require("php/database.php");
$db = new DB();
$cname= $db -> showCourseName();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/watch.css">
    <title><?php echo $cname["cname"]." Course ".$titlesuffix;?></title>
</head>
<body>
<h1 class ="heading"> <?php $cname= $db -> showCourseName();
    echo $cname["cname"]; ?></h1>
<div class="container">
	<div class="main-video">
      <?php
        $videos = $db -> showVideo();
        if(is_null($videos)){
    
          $first_video["vlink"] = "";
          $first_video["vname"] = "Course Coming Soon";
        }else{
          $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
        }
      ?>
			<iframe width="800em" height="440em" src="<?php $videos = $db -> showVideo();
                if(is_null($videos)){

                $first_video["vlink"] = "";
                $first_video["vname"] = "Course Coming Soon";
                }else{
                $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
                }
                echo $first_video["vlink"];
                ?>"
                loop controls class="mainVideo"
                allow = "accelerometer; autoplay; encrypted-media;"
                allowfullscreen
            ></iframe>
            <h3 class="titleM"><?php $videos = $db -> showVideo();
                    $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
                    if(is_null($first_video)){
                    $first_video["vlink"] = "";
                    $first_video["vname"] = "Course Coming Soon";
                    }
                    echo $first_video["vname"];
            ?></h3>

    </div>

    <div class="video-list">
        <div class="vid active">
            <iframe width="200" height="100" src="<?php $videos = $db -> showVideo();
                if(is_null($videos)){

                $first_video["vlink"] = "";
                $first_video["vname"] = "Course Coming Soon";
                }else{
                $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
                }
                echo $first_video["vlink"];?>"
            class="list-video"></iframe>
            <h3 class="title"><?php $videos = $db -> showVideo();
                    $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
                    if(is_null($first_video)){
                    $first_video["vlink"] = "";
                    $first_video["vname"] = "Course Coming Soon";
                    }
                    echo $first_video["vname"];?></h3>

        </div>
        <?php
        $videos = $db -> showVideo();
        $video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
        if(isset($videos)){
            for($i=0;$i<mysqli_num_rows($videos)-1;$i++){
                $video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
                echo '<div class="vid">';
                echo '<iframe width="200" height="100" src="',$video["vlink"],'"
                class="list-video"></iframe>';
                echo '<h3 class="title">',$video["vname"],'</h3>';
                echo '</div>';
            }
        }
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
