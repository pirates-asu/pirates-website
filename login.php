<!DOCTYPE html>
<html lang="en">
<?php require("php/sessions.php"); 
require "php/strings.php";?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $logintitle;?></title>
    <link rel="stylesheet" href="styles/users.css"/>
</head>
<body>
    <div id="left"></div>
    <div id="right">
        <form action="php/login.php" method="post">
            <div class="field">
                <h1><?php echo $login;?></h1>
            </div>
            <div class="field">
                <input type="text" name="username" placeholder="<?php echo $usernameph;?>" required/>
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="<?php echo $passwordph;?>" required/>
                
            </div>
            <div class="field">
                <input id type="submit" name="submit"/>
            </div>

            <div class="field">
                <a href="/signup.php"> OR SIGN UP </a>
            </div>

        </form>
    </div>
    

    
</body>
</html>