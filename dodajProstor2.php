<?php
require_once 'db.php';
$target_dir = "slike/";
$file = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . $file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        $stanje = $_POST['stanje'];
        $velikost = $_POST['velikost'];
        $lokacija = $_POST['lokacija'];
        $najemnina = $_POST['najemnina'];
        $opis = $_POST['opis'];
        $zacetek = $_POST['zacetek'];
        $konec = $_POST['konec'];
        $pot = $_FILES['fileToUpload'];
        $id_uporabnik = $_SESSION ['id'];

$sql = "INSERT INTO poslovni_prostori (stanje, velikost, lokacija, najemnina, opis, zacetek, konec, slika)
VALUES ('$stanje','$velikost','$lokacija','$najemnina','$opis','$zacetek','$konec','$target_file')";
        
$sql2 = "INSERT INTO poslovni_prostori_uporabniki (id_uporabnik, id_poslovni_prostor)
VALUES ('$id_uporabnik', (SELECT id FROM poslovni_prostori ORDER BY id DESC LIMIT 1))";
                
        $result = mysqli_query($conn, $sql);
        
        if($result)
        {
            echo 'Uspešno';
        }
        else
        {
            echo 'Napaka!';
            var_dump($sql);
        }
        
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
