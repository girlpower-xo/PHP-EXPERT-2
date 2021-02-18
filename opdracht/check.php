<?php include("db-con.php");?>
<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Loginsysteem</title>
    </head>
    <body>

<?php

$naam = strtolower($_POST['naam']);
$wachtwoord = $_POST['wachtwoord'];

$sql = "SELECT * FROM gebruikers WHERE voornaam  = :ph_naam";
$statement = $database_connectie->prepare($sql);
$statement->bindParam(":ph_naam", $naam);
$statement->execute();
$gebruiker = $statement->fetch(PDO::FETCH_ASSOC);

if($gebruiker != FALSE){

    //een gebruiker is gevonden
    if($gebruiker['wachtwoord'] == $wachtwoord){
        // en het wachtwoord is ocorrect.


        //Alle gegevns kloppen en dus mag er een sessie gestart worden
        session_start();
        $_SESSION["id"] =  $gebruiker['id'];
        $_SESSION["naam"] =  $gebruiker['voornnaam'];
        $_SESSION["rol"] =  $gebruiker['rol'];

        

        //als de gebruiker een klant is dan sturen we die naar klant-dashboard.php
        if($gebruiker['rol'] == "klant"){


            
            header('location: klant-dashboard.php');

        }

        //als de ggebruiker een medewerker is dan sturen we die naar medewerker-dashboard.php
        if($gebruiker['rol'] == "medewerker"){
            header('location: medewerker-dashboard.php');

        }
        
        
    }
    else{
        echo "wachtwoord is niet correct";
    }
}
else{

    echo 'De ingevoerde gebruikersnaam is niet bij ons bekend.';
}

// var_dump($gebruiker);





?>

    </body>
</html>