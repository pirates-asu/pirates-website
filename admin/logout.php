<!DOCTYPE html>
<?php
$path = dirname(getcwd(), 1);
require($path."/php/utils.php");
$_SESSION["username"] = null;
redirect("/learntoearn/login.php");
?>