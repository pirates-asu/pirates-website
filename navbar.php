<?php
require "php/strings.php";
if(isset($_SESSION["username"])){
  $uname = $_SESSION["username"];
  $result1 = mysqli_query($db -> getconnection(), "SELECT uname FROM user WHERE uusername = '$uname'");
  $user_nav = mysqli_fetch_array($result1,MYSQLI_ASSOC);
}
?>
<div class="topnav" style="max-height:6em">
<a href="/" class="logo">
<img src="/images/Pirates_log.png" style="max-width:12em;"></a>
  <div class="box_nav" style="margin:0px">
    <p class="greeting" style="padding-top:0px;padding-bottom:0px"><?php

    if(isset($_SESSION["username"])){
      echo $hi," ",$user_nav["uname"],"\n";
    }else{
      echo "";
    }
  ?></p>
  <?php

  if(isset($_SESSION["username"])){
    echo "<a href='/logout.php'>",$logout,"</a>";
  }else{
    echo "<a href='/login.php'>",$login,"</a>";
  }
?>
  <a class="active" href="index.php">Home</a>

  </div>
</div>
