<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mestna_obcina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$stanje = $_POST['stanje'];
$velikost = $_POST['velikost'];
$lokacija = $_POST['lokacija'];
$najemnina = $_POST['najemnina'];
$opis = $_POST['opis'];
$zacetek = $_POST['zacetek'];
$konec = $_POST['konec'];
$pot = $_POST ['image'];
$ime = $_FILES ['image'] ["name"];
$mysql_path = $pot."".$ime;

$sql = "INSERT INTO poslovni_prostori (stanje, velikost, lokacija, najemnina, opis, zacetek, konec, slika)
VALUES ('$stanje','$velikost','$lokacija','$najemnina','$opis','$zacetek','$konec','$mysql_path')";


if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


     header( "Location: index.php" );

?>

