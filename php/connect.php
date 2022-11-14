<?php

require("strings.php");

$connection = mysqli_connect($server,$username,$password,$database);

if(!$connection){
    die("Connection Failed");
}


?>