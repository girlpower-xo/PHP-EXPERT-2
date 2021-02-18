<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="login.php">terug naar de login pagina</a> 
</body>
</html>
<?php include("db-con.php");?>
<?php session_start(); ?>
<?php

$_SESSION = [];

session_destroy();



echo "Je bent nu uitgelogd";
