<?php 
require "php/utils.php";
session_start();


session_destroy();
redirect("/");

?>