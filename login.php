<!DOCTYPE html>
<html lang="en">
<?php require("php/sessions.php"); 
require "php/strings.php";?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="left"></div>
    <div id="right">
        <form action="php/login.php" method="post">
            <div class="field">
                <h1>Log In</h1>
            </div>
            <div class="field">
                <input type="text" name="username" placeholder="Your Username..." required/>
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Your Password..." required/>
                
            </div>
            <div class="field">
                <input id type="submit" name="submit"/>
            </div>

            <div class="field">
                <a href="/learntoearn/signup.php"> OR SIGN UP </a>
            </div>

        </form>
    </div>
    

    
</body>
</html>