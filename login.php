<html>
    <head>
        <?php
        session_start();
        ?>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="third">
        <h1>Prijava</h1>
        
        <form action="login_check.php" method="post">       
            <div class="text"> Vzdevek: </div><div class="box"><input type="text" name="chatVzdevek" /> </div>
            <div class="text"> Geslo: </div><div class="box"><input type="password" name="geslo" />    </div>       
            <div id="submit"><input type="submit" value="Prijava" /></div>
        </div>
<html>