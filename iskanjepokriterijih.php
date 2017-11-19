<?php
require 'db.php';
$velikostod = $_GET['velikostod'];
$velikostdo = $_GET['velikostdo'];
$lokacija = $_GET['lokacija'];
$najemninaod = $_GET['najemninaod'];
$najemninado = $_GET['najemninado'];
if(isset($velikostod) && isset($velikostdo) && isset($lokacija) && isset($najemninaod) && isset($najemninado))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE lokacija=$lokacija AND velikost BETWEEN $velikostod AND $velikostdo AND najemnina BETWEEN $najemninaod AND $najemninado;";
    $result = mysqli_query($conn, $query);
}
else if(isset($velikostod) && isset($velikostdo) && isset($lokacija))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE lokacija=$lokacija AND velikost BETWEEN $velikostod AND $velikostdo;";
    $result = mysqli_query($conn, $query);
}
else if(isset($lokacija) && isset($najemninaod) && isset($najemninado))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE lokacija=$lokacija AND najemnina BETWEEN $najemninaod AND $najemninado;";
    $result = mysqli_query($conn, $query);
}
else if(isset($velikostod) && isset($velikostdo) && isset($najemninaod) && isset($najemninado))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE velikost BETWEEN $velikostod AND $velikostdo AND najemnina BETWEEN $najemninaod AND $najemninado;";
    $result = mysqli_query($conn, $query);
}
else if(isset($lokacija))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE lokacija=$lokacija;";
    $result = mysqli_query($conn, $query);
}
else if(isset($velikostod) && isset($velikostdo))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE velikost BETWEEN $velikostod AND $velikostdo;";
    $result = mysqli_query($conn, $query);
}
else if(isset($najemninaod) && isset($najemninado))
{
    mysqli_query($conn, "SET NAMES 'utf8'");
    $query = "SELECT lokacija, velikost, najemnina FROM poslovni_prostori WHERE najemnina BETWEEN $najemninaod AND $najemninado;";
    $result = mysqli_query($conn, $query);
}
else
{
    echo 'Nastavi kriterij';
    exit;
}

echo $query;