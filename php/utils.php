<?php 
require "connect.php"
function redirect($url) {
    header('Location: '.$url);
    die();
}

function isloggedin(){
    if(!isset($_SESSION['username'])){
        redirect("/learntoearn/login.php");
    }
}

function isenrolled($uid,$cid){
    $query="SELECT * form enrollment WHERE uid=".$uid."AND cid=".$cid;
    $res=mysqli_query($connection,$query);
    if(mysqli_num_rows($res)){
        //you can watch videos
    }else{
        //you need to enroll

    }
    
}


?>
