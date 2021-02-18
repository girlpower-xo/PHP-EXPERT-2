<?php include("db-con.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>KLanten</title>
</head>
<body>
    
<?php 
$status = "";
$id = "";
if(isset($_GET["status"])) { $status=$_GET["status"];}
if(isset($_GET["id"])) { $id=$_GET["id"];}

if($status=="update"){
    // vragen hoe met input veld om te wijzigen?!
 $sql = "UPDATE `gebruikers` SET `achternaam` = 'hoi' WHERE `gebruikers`.`id` = :ph_id;";
 $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
 $stmt->bindParam(":ph_id", $id );
 $stmt->execute();
  }
  elseif($status="verwijder"){
    $sql = "DELETE FROM gebruikers WHERE id = :ph_id";
    $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
    $stmt->bindParam(":ph_id", $id );
    $stmt->execute();
  }
?>

<p>Klanten</p>

 
<form method="get">
<table>
    <tr>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>email</th>
        <th>telefoon nummer</th>
        <th>verwijderen</th>
        <th>wijzigen</th>
</tr>
<?php
$stmt = $database_connectie->query('SELECT * FROM `gebruikers` WHERE `rol` = "klant"');


    foreach ($stmt as $row) : 
    if($status=="wijzig"){
    ?> 
    <tr>
    <td><input type="text" value="<?php echo $row['titel'];?>" name="titel" id="titel"></td>
    <td><?=$row['voornaam'];?></td>
    <td><?=$row['achternaam'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['telefoon nummer'];?></td>
    <td> <a href="klanten.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
    <td> <a href="klanten.php?status=update&id=<?php echo $row['id']//updateField(1); ?>"> klik om te bewaren </a></td>
</tr>
<?php
}
else{
?>
<tr>
<td><?=$row['voornaam'];?></td>
    <td><?=$row['achternaam'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['telefoon nummer'];?></td>
    <td> <a href="klanten.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
    <td> <a href="klanten.php?status=wijzig&id=<?php echo $row['id']//updateField(1); ?>"> klik om te wijzigen </a></td>
</tr>
<?php
}
 endforeach;?>
</table>
</form>












    
                






