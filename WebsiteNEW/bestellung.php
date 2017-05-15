<?php session_start(); ?>
<?php 
if(!isset($_SESSION['id'])) 
   { 
   	header("Location: login.php"); 
   	exit; 
   } 
?> 
<?php
/*$link=mysql_connect("localhost", "root","");
if (!$link) {
    die('Verbindung nicht möglich : ' . mysql_error());
}
// benutze Datenbank kollegen
$db_selected = mysql_select_db('mysql', $link);
if (!$db_selected) {
    die ('Kann kollegen nicht benutzen : ' . mysql_error());
}
mysql_set_charset("utf8");*/
include "connectDB.php";
#$link = new mysqli("localhost", "root", "", "mysql");

#mysql_query("INSERT INTO orderhistory (bestellId, id, product, value, date) VALUES (NULL, 4, adsf, asdf, CURRENT_TIMESTAMP");

$sql = "INSERT INTO orderhistory (bestellId, id, product, value, date) VALUES (NULL, 4, adsf, asdf, CURRENT_TIMESTAMP";
$result = $dbconn->query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ihre Bestellung</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleCartOrder.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Javascript/script.js"></script>
</head>
<body>
<div id="overall">
	  <div id="left">
    <div id="logo"></div>
           <div id="naviAll">
             <a href="home.html" style=" margin-left:18px;"><div class="navi"><b>Home</b></div></a>
             <a href="shop.html"  style=" margin-left:30px;"><div class="navi"><b> Shop</b></div></a>
             <a href="konto.php" style=" margin-left:47px;"><div class="navi"><b> Mein Kopffleischexpress</b></div></a>
             <a href="contact.html" style="margin-left:50px;"><div class="navi"><b> Kontakt</b></div></a>
             <a href="info.html" style="margin-left:37px; width:180px;"><div class="navi" style="width:180px;"><b>Info</b></div></a>
            </div>
        </div>
        <div id="spalteRechts">
        	<div id='header'></div>
            <div id="randLinks"></div>
             <div id="randRechts"> </div>
        <div id="content">
        	<h2>Ihre Bestellung</h2> 
            <fieldset><legend>Bestellte Artikel</legend> 
            <table>     
            <?php
				$total = 0;
				foreach($_SESSION['cart'] as $product_id => $quantity) {
										
					$result = mysql_query("SELECT name,preis FROM sortiment WHERE id = $product_id");
					$row = mysql_fetch_array($result);
					
					$line_cost = $quantity * $row['preis'];
					$total += $line_cost;
					
					echo "<tr>";
					echo "<td>$quantity x</td>";
					echo "<td>".$row['name']."</td>";
					echo '<td> = '.number_format($line_cost,2,",",".").'&euro;</td>';
					echo "</tr>";
				}
				if($total < 15){
					echo "<tr>";
					echo '<td ></td>';
					echo "<td>Mindermengenaufschlag</td>";
					echo '<td> = 5,00&euro;</td>';
					echo "</tr>";
					$total += 5;
				}
				echo '<tr>';
				echo '<td ></td>';
				echo '<td ><hr style="color:#FFF;"/></td>';
				echo '<td><hr style="color:#FFF;"/></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td ></td>';				
				echo '<td >Gesamtkosten</td>';
				echo '<td> = '.number_format($total,2,",",".").'&euro;</td>';
				echo '</tr>';
            ?>
            </table>
            <a style="text-decoration:none;color:#001f0a;" href="cart.php"><div id="cartLink">&Auml;ndern</div></a>
            <span style="margin-left:10px;">Alle Preise sind inklusive Mehrwertsteuer</span>
            </fieldset>
            <fieldset><legend>Rechnungs- &amp; Lieferadresse</legend>
            <table>

            <?php
				$result = mysql_query("SELECT name,strasse,plz,ort FROM users WHERE id = ".$_SESSION['id']);
				$row = mysql_fetch_array($result);
				echo "<tr><td>".$row['name']."</td></tr>";
				echo "<tr><td>".$row['strasse']."</td></tr>";
				echo "<tr><td>".$row['plz']." ".$row['ort']."</td></tr>";
			
			?>
            </table>
            <div id="cartLink"><a style="text-decoration:none;color:#001f0a;" href="konto.php">&Auml;ndern</a></div>
            </fieldset>
            
            <a href="javascript:document.forms[0].submit();"><div style="margin-top:10px;" id="btBest">Bestellen</div></a>
        </div>
        </div>
    </div> 
</body>
</html>