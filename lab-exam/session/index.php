<!-- cookie: saves info on the user side, meaning inside the browser --ends when timer expires
session: saves info about the user on the server side. --ends when we close the browser  -->

<!-- 
    making cookies:
setcookie(nameofcookie, value of cookie, timelimit)
setcookie("cookie1", "aaditya", time()+86400)
time(): current time, 86400ms: one day: total validity of cookie is one day
to destroy cookies, set the time  as negative: setcookie("name", "value", time()-1) 
-->

<!-- 
    making sessions:
$_SESSION[nameofsession] = value;
$_SESSION["session1"] = "aaditya";  
:in the value of the cookie, we can add the actual ID of the user as is stored in the database.
  -->


<?php
session_start();

$_SESSION["username"] = "easyonaaditya"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world</h1>
    <?php
    echo $_SESSION["username"]
    ?>
    
</body>
</html>