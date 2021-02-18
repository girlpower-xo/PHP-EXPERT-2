
<?php include("db-con.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginsysteem</title>
</head>
<body>
    <h1>Welkom bij Snelle Jelle </h1>

    <form method="post" action="check.php">
        Naam: <input type="text" name="naam" />
        Wachtwoord: <input type="password" name="wachtwoord" />
        <input type="submit" name="loginSubmit" value="Log in!" /> 
    </form>


</body>
</html>
