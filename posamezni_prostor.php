<?php
if (isset($_SESSION['id']))
{
    $sql = "SELECT * FROM poslovni_prostori WHERE id LIKE '$id'";
        $result = mysqli_query($conn, $sql);
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
        echo "<table border=1>";
            echo "<tr>
                <td>$lokacija</td>
                <td>$velikost</td>
                <td>$najemnina</td>
                <td>$prosto</td>
                <td>$stanje</td>
                <td>$zacetek</td>
                <td>$konec</td>
                <td>$slika</td>
                <td>$opis</td>";
        echo "</table>";
}