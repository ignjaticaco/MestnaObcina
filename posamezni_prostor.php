<?php
session_start();
include_once 'db.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php
if (isset($_SESSION['id']))
{
    $sql = "SELECT * FROM poslovni_prostori WHERE id LIKE '1'";
    $sql2 = "SELECT url FROM videoposnetki WHERE id_poslovni_prostor LIKE '1'";
        $result = mysqli_query($conn, $sql);
        $qry = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($qry)) {
        while($row = mysqli_fetch_array($result))
        {
            $lokacija = $row['lokacija'];
            $velikost = $row['velikost'];
            $najemnina = $row['najemnina'];
            $prosto = $row['prosto'];
            $stanje = $row['stanje'];
            $zacetek = $row['zacetek'];
            $konec = $row['konec'];
            $slika = $row['slika'];
            $opis = $row['opis'];
        }
            echo "<div id=\"third\">
                <div class=\"text3\">$lokacija</div>
                <div class=\"text3\">$velikost</div>
                <div class=\"text3\">$najemnina</div>
                <div class=\"text3\">$prosto</div>
                <div class=\"text3\">$stanje</div>
                <div class=\"text3\">$zacetek</div>
                <div class=\"text3\">$konec</div>
                <div class=\"text3\">$slika</div>
                <div class=\"text3\">$opis</div>
            <div class=\"text3\"><iframe width=\"160\" height=\"120\"  frameborder=\"0\" allowfullscreen src=".$row2['url']."></iframe>
        </div></div>";
}}?>
</body>
</html>
