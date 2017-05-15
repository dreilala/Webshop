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

$link = new mysqli("localhost", "root", "", "mysql");

$id = $_POST["id"];

$result = mysql_query("SELECT * FROM sortiment WHERE id = ".$id);
$data = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Produktdetails</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleShopDetail.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
       		<div id="cartLink"><a style="font-size:29px;text-decoration:none;color:#001f0a;" href="cart.php">Warenkorb</a></div>
        	<h2 style="font-size:34px;">Produktdetails</h2>
            
            <img id="added" style="display:none;position:absolute;top:120px;left:200px;" src="Pictures/Gruener-Haken.png" width="75px"/>
            
            <div id="artikelTable">          
            <?php
			if(!$data){
				echo "Dieses Produkt gibt es leider nicht";
			}
			else{
				//echo "<img src=''>";
				echo "<div id=\"artikel\">";
						echo "<span style=\"font-weight:bold;font-size:23px;\">".$data["name"]."</span></br>";
						echo "<span style=\"font-size:17px\">".$data["art"].", ".formatGewicht($data["gewicht"])."</br>";
						echo $data["beschreibung"]."</span>";
						echo "<div style='margin-top:5px'>";
						echo "<form method=\"post\">";
						echo "<input type=\"hidden\" name=\"id\" value=\"$id\" />";
						echo "<input type=\"hidden\" name=\"action\" value=\"add\" />";
						echo "<span style=\"font-size:19px;font-weight:bold;float:left\">Einzelpreis: ".number_format($data["preis"],2,",",".")."&euro;</span>";
						echo "<span style=\"font-size:19px;font-weight:bold;float:right\">Menge "; 
						echo "<input type=\"text\" name=\"menge\" size=\"2\" value=\"1\"/>";
						echo "<a href=\"javascript:post(0);\"><img src=\"Pictures\cart_add.png\" width=\"30px\"/></a>" . "</span>";
					echo "</form>";
				echo "</div>";
			}
			function formatGewicht($g){
				if($g>=1000){return number_format($g/1000,1,",",".")."kg";}
				if($g>=100){return "".$g."g";}
				if($g<100){return $g." St&uuml;ck";}
			}
				
            ?>
        	</div>
        </div>
        </div>
       <div id="foot"></div>
    </div>
        
</body>
</html>