<!DOCTYPE html>
<html lang="en">
<?php require("php/sessions.php"); ?>
<?php require("php/utils.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    isloggedin();
    
    ?>
    <h1>Hello, <?php echo $_SESSION["username"] ?></h1>
</body>
</html>