<?php 

function redirect($url) {
    header('Location: '.$url);
    die();
}

function isloggedin(){
    if(!isset($_SESSION['username'])){
        redirect("/learntoearn/login.php");
    }
}

function empty_check($field){
    if(!empty($field)){
        return 1;
    }else{
        return 0;
    }
}

?>
