<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include("db-con.php");
$item= "";
$status="";
$titel="";
$datum="";
$tijdstip = 0;
$opmerking="";
$kosten= 0;
$merk="";
$typerem="";
$voornaam="";
$achternaam="";
$email="";
$telefoonnummer=0;
$wachtwoord="";
$rol="";
$sql="";


if(isset($_POST["item"])){$item=$_POST["item"];} else {$item="";}
if(isset($_POST["id"])){$id=$_POST["id"];} else {$id="";}
if(isset($_POST["status"])){$status=$_POST["status"];} else {$status="";}
if(isset($_POST["titel"])){$titel=$_POST["titel"];} else {$titel="";}
if(isset($_POST["datum"])){$datum=$_POST["datum"];} else {$datum="";}
if(isset($_POST["tijdstip"])){$tijdstip=(int) $_POST["tijdstip"];} else {$tijdstip="";}
if(isset($_POST["opmerking"])){$opmerking=$_POST["opmerking"];} else {$opmerking="";}
if(isset($_POST["kosten"])){$kosten=(int) $_POST["kosten"];} else {$kosten="";}
if(isset($_POST["merk"])){$merk=$_POST["merk"];} else {$merk="";}
if(isset($_POST["model"])){$model=$_POST["model"];} else {$model="";}
if(isset($_POST["type"])){$type=$_POST["type"];} else {$type="";}
if(isset($_POST["kleur"])){$kleur=$_POST["kleur"];} else {$kleur="";}
if(isset($_POST["typerem"])){$typerem=$_POST["typerem"];} else {$typerem="";}
if(isset($_POST["voornaam"])){$voornaam=$_POST["voornaam"];} else {$voornaam="";}
if(isset($_POST["achternaam"])){$achternaam=$_POST["achternaam"];} else {$schternaam="";}
if(isset($_POST["email"])){$email=$_POST["email"];} else {$email="";}
if(isset($_POST["telefoonnummer"])){$telefoonnummer=(int) $_POST["telefoonnummer"];} else {$telefoonnummer="";}
if(isset($_POST["wachtwoord"])){$wachtwoord=$_POST["wachtwoord"];} else {$wachtwoord="";}
if(isset($_POST["rol"])){$rol=$_POST["rol"];} else {$rol="";}


if($status=="opslaan"){
    if($item=="reparatie"){
        $sql = "INSERT INTO `reparaties` (`id`, `titel`, `datum`, `tijdstip`, `opmerking`, `kosten`) VALUES (NULL, '$titel', '$datum', $tijdstip, '$opmerking', $kosten)"; 
                          }
    elseif($item=="fiets"){
        $sql= "INSERT INTO `fiets` (`id`, `merk`, `model`, `type`, `kleur`, `type rem`) VALUES (NULL, '$merk', '$model', '$type', '$kleur', '$typerem')";
    }
    else{
    $sql=  "INSERT INTO `gebruikers` (`id`, `voornaam`, `achternaam`, `email`, `telefoon nummer`, `wachtwoord`, `rol`) VALUES (NULL, '$voornaam', '$achternaam', '$email', '$telefoonnummer', '$wachtwoord', 'klant')";
    }

    $stmt = $database_connectie->query($sql);
    $stmt->execute();
    echo "klaar";
    

}else{

    ?>


 <form method="POST" action="aanmaken.php">
<select name="item" id="item">
<option value="">kies item</option>
<option value="reparatie" <?php if($item=="reparatie"){echo "selected";}?>>Nieuwe reparatie</option>
<option value="fiets" <?php if($item=="fiets"){echo "selected";}?>>Nieuwe fiets</option>
<option value="klant" <?php if($item=="klant"){echo "selected";}?>>Nieuwe klant</option>
</select>
<?php if($item==""){?>

<button type="submit" >Kies</button>
<?php } ?>
<?php 

if($item == "reparatie"){?>
    <table>
    <tr>
    <td><input type="text" value="" name="titel" id="titel" placeholder="titel"></td>
    <td><input type="text" value="" name="datum" id="datum" placeholder="datum"></td>
    <td><input type="number" value="" name="tijdstip" id="tijdstip" placeholder="tijdstip"></td>
    <td><input type="text" value="" name="opmerking" id="opmerking" placeholder="opmerking"></td>
    <td><input type="number" value="" name="kosten" id="kosten" placeholder="kosten"></td>
    <td><input type="submit" name="status" id="status" value="opslaan"></td>
   
                    </tr>
                    </table>
                     
     <?php } //if status afsluiten  
                    
elseif($item == "fiets"){?>
    <table>
    <tr>
    <td><input type="text" value="" name="merk" id="merk" placeholder="merk"></td>
    <td><input type="text" value="" name="model" id="model" placeholder="model"></td>
    <td><input type="text" value="" name="type" id="type" placeholder="type"></td>
    <td><input type="text" value="" name="kleur" id="kleur" placeholder="kleur"></td>
    <td><input type="text" value="" name="typerem" id="typerem" placeholder="type rem"></td>
    <td><input type="submit" name="status" id="status" value="opslaan"></td>
                       
                                        </tr>
                                        </table>
                                        <?php } 
elseif($item == "klant"){?>
    <table>
    <tr>
    <td><input type="text" value="" name="voornaam" id="voornaam" placeholder="voornaam"></td>
    <td><input type="text" value="" name="achternaam" id="achternaam" placeholder="achternaam"></td>
    <td><input type="text" value="" name="email" id="email" placeholder="email"></td>
    <td><input type="number" value="" name="telefoonnummer" id="telefoonnummer" placeholder="telefoon nummer"></td>
    <td><input type="text" value="" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord"></td>
    <td><input type="text" value="" name="rol" id="rol" placeholder="rol"></td>
    <td><input type="submit" name="status" id="status" value="opslaan"></td>
                       
                                        </tr>
                                        </table>

                                       
                                       
 
                                        <?php }} ?>
</form>
</body>
</html>