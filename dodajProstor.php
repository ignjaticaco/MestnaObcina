<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    location:('dodajanjeProstora.php');
} else {
    echo "Please log in first to see this page."
    . "<a href ='login.php'> Klikni tukaj za prijavo </a> ";
}

