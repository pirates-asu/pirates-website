<?php
require "sessions.php";
require "database.php";
require "strings.php";
$username= $_POST["username"];
$password= $_POST["password"];

$db = new DB();

$login = $db->login($_POST["submit"],$username,$password);

if ($login[0] == 1) {
    $_SESSION["username"] = $username;
    $_SESSION["userrole"] = $login[1];
    if ($login[1] == 1) {
        redirect("/index.php");
    } elseif ($login[1] == 0) {
        redirect("/admin/addcourse.php");
    } else {
        echo $login[0];
    }
}

?>