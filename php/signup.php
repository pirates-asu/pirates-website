<?php
require "sessions.php";
require "connect.php";
require "strings.php";
require "utils.php";

$username= $_POST["username"];
$password1= $_POST["password1"];
$password2= $_POST["password2"];
$email= $_POST["email"];
$address= $_POST["address"];
$country= $_POST["country"];
$name= $_POST["name"];

if(isset($_POST["submit"]) && empty_check($username,$password1,$email,$address,$country,$name)){

    if(password_check($password1,$password2) == 1 && usernameavailable($connection,$username) == 1 ){
        $query="INSERT INTO user (uusername, upassword, uemail, uname, uaddress, ucountry, urole) VALUES('$username','".md5($password1)."','$email','$name','$address','$country', 1)";
        $result = mysqli_query($connection,$query);
        redirect($mainpath."login.php");

    }else{
        
    }

}else{
    echo "Please enter complete data";
}

function empty_check($username,$password1,$email,$address,$country,$name){
    if(!empty($username)&& !empty($password1)&& !empty($email)&& !empty($address)&&!empty($country) &&!empty($name)){
        return 1;
    }else{
        return 0;
    }
}


function password_check($password1, $password2){
    if($password1===$password2){
        return 1;
    }else{
        echo "Make sure both passwords are identical";
        return 0;
        
    }
}

function usernameavailable($connection, $username){
    $query="SELECT * FROM user WHERE uusername='".$username."'";
    $result  = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)){
        echo "Please choose different username";
        return 0;
        
    }else{
        return 1;
        
    }
}

function emailavailable($connection, $email){
    $query="SELECT * FROM user WHERE uemail='".$email."'";
    $result  = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)){
        echo "please choose different email";
        return 0;
        
    }else{
        return 1;
    }

}



?>