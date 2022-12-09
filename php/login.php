<?php
require "sessions.php";
require "database.php";
$username= $_POST["username"];
$password= $_POST["password"];

$db = new DB();

$login = $db->login($_POST["submit"],$username,$password);

if($login == 1){
    $_SESSION["username"]=$username;
    redirect("/learntoearn/index.php");
}else{
    echo $login;
}







?>