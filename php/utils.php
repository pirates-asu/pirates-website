<?php 
function redirect($url) {
    header('Location: '.$url);
    die();
}

function isloggedin($urole){
    //urole = 0 for admin, 1 for regular user
    if (!isset($_SESSION["username"]) || !($_SESSION["userrole"]==$urole)) {
        redirect("/login.php");
    }
}

function empty_check($field){
    if(!empty($field)){
        return 1;
    }else{
        return 0;
    }
}

function ack_removed($removed, $vid1course0) {
    if ($removed) {
        if($vid1course0==1) {
            echo '<script>alert("Video removed successfully")</script>';
        } else {
            echo '<script>alert("Course removed successfully")</script>';
        }
        header("Refresh:0");
    } else {
        if($vid1course0==1) {
            echo '<script>alert("No videos found")</script>';
        } else {
            echo '<script>alert("No courses found")</script>';
        }
    }
    header("Refresh:0");
}

function ack_added($vid1course0) {
    if($vid1course0==1) {
        echo '<script>alert("Video Added successfully")</script>';
    } else {
        echo '<script>alert("Course Added successfully")</script>';
    }
    header("Refresh:0");
}

?>
