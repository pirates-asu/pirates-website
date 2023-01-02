<!DOCTYPE html>
<html lang="en">
<?php require("php/sessions.php"); 
require "php/strings.php";?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $signuptitle;?></title>
    <link rel="stylesheet" href="styles/users.css"/>
</head>
<body>
    <div id="left"></div>
    <div id="right">
    <form action="php/signup.php" method="post">
        <div class="field">
            <h1><?php echo $signup;?></h1>
        </div>
        <div class="field">

            <input type="text" name="name" required placeholder="<?php echo $fullph;?>"/>
         </div>

         <div class="field">
        <input type="text" name="username" required placeholder="<?php echo $usernameph;?>"/>
    </div>
        <div class="field">
        <input type="email" name="email" required placeholder="<?php echo $emailph;?>"/>
    </div>
        <div class="field">
        <input type="password" name="password1" required placeholder="<?php echo $passwordph;?>"/>
    </div>
        <div class="field">
        <input type="password" name="password2" required placeholder="<?php echo $password2ph;?>"/>
    </div>
        <div class="field">
        <input type="text" name="address" required placeholder="<?php echo $addressph;?>"/>
    </div>
        <div class="field">
        <input type="text" name="country" required placeholder="<?php echo $countryph;?>"/>
    </div>
        <div class="field">
        <input type="submit" name="submit"/>
    </div>
    </form>
</div>
    
</body>
</html>