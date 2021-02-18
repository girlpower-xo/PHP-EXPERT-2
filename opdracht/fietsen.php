<?php include("db-con.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>fietsen</title>
</head>
<body>
    <div class="">    
        
        <?php 
        $stmt = $database_connectie->query('SELECT * FROM fiets');
        $status = "";
        $id = "";
        $titel = ""; 
        if(isset($_GET["status"])){$status=$_GET["status"];} else {$status="";}
        if(isset($_GET["id"])){$id=$_GET["id"];} else {$id="";}
        if(isset($_GET["merk"])){$merk=$_GET["merk"];} else {$merk = "";}
        if(isset($_GET["model"])){$model=$_GET["model"];} else {$model = "";}
        if(isset($_GET["type"])){$type=$_GET["type"];} else {$type= "";}
        if(isset($_GET["kleur"])){$kleur=$_GET["kleur"];} else {$kleur= "";}
        if(isset($_GET["type rem"])){$typerem=$_GET["type rem"];} else {$typerem= "";}
        
        //echo $titel;
        
        ?>

        <?php

        if($status=="update"){
                // vragen hoe met input veld om te wijzigen?!
            //$sql = "UPDATE `reparaties` SET `titel` = :ph_titel WHERE `gebruikers`.`id` = :ph_id;";
            $sql = "UPDATE `fiets` SET `merk` = :merk , `model` = :model , `type` = :type , `kleur` = :kleur , `type rem` = :type_rem  WHERE `fiets`.`id` = :ph_id;";
            $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
            $stmt->bindParam(":ph_id", $id );
            $stmt->bindParam(":merk", $merk);
            $stmt->bindParam(":model", $model);
            $stmt->bindParam(":type", $typ);
            $stmt->bindParam(":kleur", $kleur);
            $stmt->bindParam(":type_rem", $typerem);
            $stmt->execute();
        }
        elseif($status=="verwijder"){
            $sql = "DELETE FROM fiets WHERE id = :ph_id";
            $stmt = $database_connectie->prepare($sql); //stuur naar mysql.
            $stmt->bindParam(":ph_id", $id );
            $stmt->execute();
        }

                $sql = "SELECT * FROM fiets";
                $stmt = $database_connectie->query($sql);
                $stmt->execute();

        ?>

        <p>fietsen</p>


            <table>
                <tr>
                    <th>merk</th>
                    <th>model</th>
                    <th>type</th>
                    <th>kleur</th>
                    <th>type rem</th>
                    <th>wijzigen</th>
                    <th>verwijderen</th>

                </tr>
            <?php
            foreach ($stmt as $row) : 
                if($status == "wijzig" && $row['id'] == $id){?> 
                <form method="GET" action="fietsen.php">
                    <tr>
                        <td><input type="text" value="<?php echo $row['merk']?>" name="merk" id="merk"></td>
                        <td><input type="text" value="<?php echo $row['model']?>" name="model" id="model"></td>
                        <td><input type="text" value="<?php echo $row['type']?>" name="type" id="type"></td>
                        <td><input type="text" value="<?php echo $row['kleur']?>" name="kleur" id="kleur"></td>
                        <td><input type="text" value="<?php echo $row['type rem']?>" name="type rem" id="type rem"></td>
                        <td><input type="submit" name="status" id="status" value="update"></td>
                        <td><a href="fietsen.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
                    </tr>
                    <input type="hidden" name="id" type="id" value="<?= $row["id"];?>">
                </form>
            <?php }
            else { ?>
                    <tr>
                        <td><?= $row['merk'];?></td>
                        <td><?= $row['model'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['kleur'];?></td>
                        <td><?php echo $row['type rem'];?></td>
                        <td><a href="fietsen.php?status=wijzig&id=<?php echo $row['id'];?>"> klik om te wijzigen </a></td>
                        <td><a href="fietsen.php?status=verwijder&id=<?php echo $row['id'];?>"> klik om te verwijderen </a></td>
                    </tr>
            <?php }
            endforeach;?>
            </table>



            
    </div>
</body>
</html>







    
                






