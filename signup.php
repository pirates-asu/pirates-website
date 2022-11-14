<!DOCTYPE html>
<html lang="en">
<?php require("php/sessions.php"); ?>
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
    <form action="php/signup.php" method="post">
        <div class="field">
            <h1>Sign Up</h1>
        </div>
        <div class="field">

            <input type="text" name="name" required placeholder="Your Full Name ..."/>
         </div>

         <div class="field">
        <input type="text" name="username" required placeholder="Your Username ..."/>
    </div>
        <div class="field">
        <input type="email" name="email" required placeholder="Your Email ..."/>
    </div>
        <div class="field">
        <input type="password" name="password1" required placeholder="Your Password ..."/>
    </div>
        <div class="field">
        <input type="password" name="password2" required placeholder="Re-enter Your Password ..."/>
    </div>
        <div class="field">
        <input type="text" name="address" required placeholder="Your Address ..."/>
    </div>
        <div class="field">
        <input type="text" name="country" required placeholder="Your Country ..."/>
    </div>
        <div class="field">
        <input type="submit" name="submit"/>
    </div>
    </form>
</div>
    
</body>
</html>