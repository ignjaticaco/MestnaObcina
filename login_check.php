<?php

include_once './db.php';
    session_start();
    
    $chatVzdevek = $_POST['chatVzdevek'];
    $geslo = $_POST['geslo'];
    $geslo = sha1($geslo);
                   
                


               $query = "SELECT * FROM  uporabniki WHERE chatVzdevek='$chatVzdevek' AND  geslo='$geslo'";
                mysqli_real_escape_string($conn,$chatVzdevek);
               $result = mysqli_query($conn,$query);
               $res = mysqli_num_rows($result);

               if($res == 1)

               {
               $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $_SESSION['id'] = $user['id'];
              
              $_SESSION['ime'] = $user['ime'];
              $_SESSION['priimek'] = $user['priimek'];
               $_SESSION['chatVzdevek'] = $user['chatVzdevek'];
               $_SESSION['loggedin']= true ;
              
              header('Location: index.php');

              
               exit();
               }else{


               echo  "Niste Prijavljeni.";

               }
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

