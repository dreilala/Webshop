<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webshop</title>
    </head>
    <body>
        
        
        <?php
        $myxml = simplexml_load_file("config/navigation.xml");
        foreach ($myxml->normal as $zeile) {
            echo "<a href='index.php'>$zeile->home</a>";
            echo "<br />";
            echo "<a href='produkt.php'>$zeile->produkt</a>";
            echo "<br />";
            echo "<a href='warenkorb.php'>$zeile->warenkorb</a>";
            echo "<br />";
            echo "<a href='sites/login.php'>Login</a>";
            echo "<br />";
            echo "<a href='sites/register.php'>Register</a>";
            
        }
        ?>
    </body>
</html>
