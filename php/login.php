<?php
require "sessions.php";
require "connect.php";
require "utils.php";
$username= $_POST["username"];
$password= $_POST["password"];

if(isset($_POST["submit"]) && empty_check($username,$password)==1){

    $query="SELECT * FROM user WHERE uusername='".$username."' AND upassword='".md5($password)."'";
    
    if(mysqli_num_rows(mysqli_query($connection,$query))==1){
        $_SESSION["username"]=$username;
        redirect($mainpath."/index.php");
        
    }else{
        echo "please enter valid credentials";
    }
}else{
    echo "Please enter complete data";
}




function empty_check($username,$password){
    if(!empty($username)&& !empty($password)){
        return 1;
    }else{
        return 0;
    }
}



?>