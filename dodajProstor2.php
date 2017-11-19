<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mestna_obcina";

if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   

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
}

     //header( "Location: index.php" );

?>

