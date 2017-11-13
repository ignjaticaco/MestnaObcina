<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="dodajProstor2.php" method="post">
        <p>Stanje:</p><input type="text" name="stanje">
        <p>Velikost:</p> <input type="number" name="velikost">
        <p>Lokacija:</p><input type="text" name="lokacija">
        <p>Opis:</p><input type="text" name="opis">
        <p>Zacetek:</p><input type="date" name="zacetek">
        <p>Konec:</p><input type="date" name="konec">
        <input type="submit" value="Poslji">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
