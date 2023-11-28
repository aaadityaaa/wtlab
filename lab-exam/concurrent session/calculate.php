<?php
session_start();
$username = $_POST['username'];

$_SESSION["username"] = $username;

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
    exit();
}

if(isset($_SESSION["active_session"]) && $_SESSION["active_session"]>3){
    echo "Max limit reached, cannot login";
    exit();
}

if(!isset($_SESSION["active_session"])){
    $_SESSION["active_session"] = 1;
}
else{
    $_SESSION["active_session"]++;
}
echo "No of sessions is: ".$_SESSION["active_session"];
header("Location: dashboard.php");
    exit();
?>