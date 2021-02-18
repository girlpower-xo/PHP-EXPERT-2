<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<?php 



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$mysqli = new mysqli('localhost', 'root', '', 'snellejelle');
if ($mysqli->connect_error) {
    die('');
}
?>

<p>Tweedehands fietsen</p>


<?php
$stmt = $mysqli->query('SELECT * FROM tweedehandsfietsen');
    foreach ($stmt as $row) : ?>
<table>
<tr>
                    <th>merk</th>
                    <th>model</th>
                    <th>type</th>
                    <th>kleur</th>
                    <th>soort rem</th>
                    <th>bouwjaar</th>

                </tr>
<tr>
<td><?=$row['merk'];?></td>
<td><?=$row['model'];?></td>
<td><?=$row['type'];?></td>
<td><?=$row['kleur'];?></td>
<td><?=$row['soort rem'];?></td>
<td><?=$row['bouwjaar'];?></td>
</tr>


    </table>
<?php endforeach;?>




    
                






