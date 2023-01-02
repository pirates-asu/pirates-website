<?php
require "sessions.php";
require "database.php";
require "strings.php";

$username= $_POST["username"];
$password1= $_POST["password1"];
$password2= $_POST["password2"];
$email= $_POST["email"];
$address= $_POST["address"];
$country= $_POST["country"];
$name= $_POST["name"];

$db = new DB();

$signup = $db->signup($_POST["submit"],$username,$password1,$password2,$email,$address,$country,$name);

if ($signup==1){
    redirect("/login.php");
}else{
    echo $signup;
}

?>