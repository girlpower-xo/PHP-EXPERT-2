<?php include("db-con.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reparaties</title>
</head>
<body>
    <div class="">    
        
        <?php 
        //$stmt = $database_connectie->query('SELECT * FROM reparaties');
        $status = "";
        $id = "";
        $titel = ""; 
        if(isset($_GET["status"])){$status=$_GET["status"];} else {$status="";}
        if(isset($_GET["id"])){$id=$_GET["id"];} else {$id="";}
        if(isset($_GET["titel"])){$titel=$_GET["titel"];} else {$titel = "";}
        if(isset($_GET["datum"])){$datum=$_GET["datum"];} else {$datum = "";}
        if(isset($_GET["tijdstip"])){$tijdstip=$_GET["tijdstip"];} else {$tijdstip= "";}
        if(isset($_GET["opmerking"])){$opmerking=$_GET["opmerking"];} else {$opmerking= "";}
        if(isset($_GET["kosten"])){$kosten=$_GET["kosten"];} else {$kosten= "";}
        
        //echo $titel;
        
        ?>

        <?php

        if($status=="update"){
                // vragen hoe met input veld om te wijzigen?!
            //$sql = "UPDATE `reparaties` SET `titel` = :ph_titel WHERE `gebruikers`.`id` = :ph_id;";
            $sql = "UPDATE `reparaties` SET `titel` = :titel , `datum` = :datum , `tijdstip` = :tijdstip , `opmerking` = :opmerking , `kosten` = :kosten  WHERE `reparaties`.`id` = :ph_id;";
            $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
            $stmt->bindParam(":titel", $titel);
            $stmt->bindParam(":datum", $datum);
            $stmt->bindParam(":tijdstip", $tijdstip);
            $stmt->bindParam(":opmerking", $opmerking);
            $stmt->bindParam(":kosten", $kosten);
            $stmt->bindParam(":ph_id", $id );
            $stmt->execute();
        }
        elseif($status=="verwijder"){
            $sql = "DELETE FROM reparaties WHERE id = :ph_id";
            $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
            $stmt->bindParam(":ph_id", $id );
            $stmt->execute();
        }

                $sql = "SELECT * FROM reparaties";
                $stmt = $database_connectie->query($sql);
                $stmt->execute();

        ?>

        <p>Reparaties</p>


            <table>
                <tr>
                    <th>Titel</th>
                    <th>datum</th>
                    <th>tijdstip</th>
                    <th>opmerking</th>
                    <th>kosten</th>
                    <th>wijzigen</th>
                    <th>verwijderen</th>

                </tr>
            <?php
            foreach ($stmt as $row) : 
                if($status == "wijzig" && $row['id'] == $id){?> 
                <form method="GET" action="reparaties.php">
                    <tr>
                        <td><input type="text" value="<?php echo $row['titel']?>" name="titel" id="titel"></td>
                        <td><input type="text" value="<?php echo $row['datum']?>" name="datum" id="datum"></td>
                        <td><input type="text" value="<?php echo $row['tijdstip']?>" name="tijdstip" id="tijdstip"></td>
                        <td><input type="text" value="<?php echo $row['opmerking']?>" name="opmerking" id="opmerking"></td>
                        <td><input type="text" value="<?php echo $row['kosten']?>" name="kosten" id="kosten"></td>
                        <td><input type="submit" name="status" id="status" value="update"></td>
                        <td><a href="reparaties.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
                    </tr>
                    <input type="hidden" name="id" type="id" value="<?= $row["id"];?>">
                </form>
            <?php }
            else { ?>
                    <tr>
                        <td><?= $row['titel'];?></td>
                        <td><?= $row['datum'];?></td>
                        <td><?php echo $row['tijdstip'];?></td>
                        <td><?php echo $row['opmerking'];?></td>
                        <td><?php echo $row['kosten'];?></td>
                        <td><a href="reparaties.php?status=wijzig&id=<?php echo $row['id'];?>"> klik om te wijzigen </a></td>
                        <td><a href="reparaties.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
                    </tr>
            <?php }
            endforeach;?>
            </table>



            
    </div>
</body>
</html>







    
                






