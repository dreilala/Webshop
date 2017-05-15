<?php
/*//Verbindung herstellen
$link=mysql_connect("localhost", "root","") or die('Verbindung nicht möglich : ' . mysql_error());

//Datenbank auswählen
$db_selected = mysql_select_db('mysql', $link) or die ('Kann kollegen nicht benutzen : ' . mysql_error());

//Zeichensatz setzen
mysql_set_charset("utf8");*/
$host = "localhost";
$user = "root";
$pw = "";
$db = "mysql";
        
$dbconn = new mysqli($host, $user, $pw, $db);
#$link = new mysqli($host, $user, $pw, $db);
?>