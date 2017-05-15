<?php 
session_start(); 
?> 

<?php 
if(!isset($_SESSION["id"])) 
   { 
   header("Location: login.php"); 
   exit; 
   }
   $verbindung = new mysqli("localhost", "root", "", "mysql");
#   $verbindung = mysql_connect("localhost", "root" , "")
#or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
#mysql_set_charset('utf8');
#mysql_select_db("mysql", $verbindung) or die ("Datenbank konnte nicht ausgewählt werden"); 

$userError = '';
$passError = '';
$strasseError = '';
$ortError = '';
$plzError = '';
$teleError = '';
$mailError = '';
$passWdhError = '';

if(isset($_POST['user'])){
	$errorOccurred = 0;
	$username = $_POST['user'];
	$strasse = $_POST['strasse'];
	$ort = $_POST['ort'];
	$plz = $_POST['plz'];
	$tele = $_POST['tele'];
	$mail = $_POST['email'];
	
	if(!preg_match('/^([A-ZÖÜÄ][a-züäö]+[ ]?){1,2}$/',$username)){
		$userError = "Bitte gültigen Namen eintragen.";
		$errorOccurred = 1;
	}
	if(!preg_match('/^[A-ZÜÖÄ][a-züöäß]+(\.)?( [A-ZÖÜÄ][a-zöüäß]+)?(\.)? \d+(\/\d+\/\d+)?$/',$strasse)){
		$strasseError = "Bitte gültige Adresse eintragen.";
		$errorOccurred = 1;
	}
	if(!preg_match('/^([A-ZÄÖÜ][a-zäöüß]+[ ]?){1,3}$/',$ort)){
		$ortError = "Bitte gültigen Ort eintragen.";
		$errorOccurred = 1;
	}
	if(!preg_match('/^[0-9]{4}$/',$plz)){
		$plzError = "Bitte gültige Postleitzahl eintragen.";
		$errorOccurred = 1;
	}
	if(!preg_match('/^(0650|0660|0664|0676|0699)[1-9]\d{5,10}$/',$tele)){
		$teleError = "Bitte gültige Handynummer eintragen.";
		$errorOccurred = 1;
	}
	if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$mail)){
		$mailError = "Bitte gültige E-Mail eintragen.";
		$errorOccurred = 1;
	}
	if(!$errorOccurred){
	$erg = mysql_query("UPDATE users SET name=\"".$username."\",strasse=\"".$strasse."\",ort=\"".$ort."\",plz=\"".$plz."\",tel=\"".$tele."\",mail=\"".$mail."\" WHERE id='".$_SESSION['id']."'") or die (mysql_error());
	}
}

$result=mysql_query("SELECT * FROM users WHERE id='".$_SESSION['id']."'") or die (mysql_error());
$row=mysql_fetch_array($result);

$historyResult = mysql_query("SELECT date,product,value FROM orderhistory WHERE id ='". $_SESSION['id']."' ORDER BY date");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kopffleischexpress - Tiernahrung &amp; Kauspezialitäten</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleKonto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Javascript/script.js"></script>
</head>
<body onload="loadAGBs()">
	<div id="overall">
    
	  <div id="left">
    <div id="logo"></div>
           <div id="naviAll">
             <a href="home.html" style=" margin-left:18px;"><div class="navi" onClick="goTo('home');"><b>Home</b></div></a>
             <a href="shop.html"  style=" margin-left:30px;"><div class="navi" onClick="goTo('shop');"><b> Shop</b></div></a>
             <a href="konto.php" style=" margin-left:47px;"><div class="navi" onClick="goTo('konto');"><b> Mein Kopffleischexpress</b></div></a>
             <a href="contact.html" style="margin-left:50px;"><div class="navi" onClick="goTo('kontakt');"><b> Kontakt</b></div></a>
             <a href="info.html" style="margin-left:37px; width:180px;"><div class="navi" style="width:180px;" onClick="goTO('info');"><b>Info</b></div></a>
            </div>           
            
        </div>
        <div id="spalteRechts">
        	<div id="header"></div>
            <div id="randLinks"></div>
             <div id="randRechts"> </div>
        <div id="content">
        	<h2>Mein Kopffleischexpress</h2>
            <div>
            	<a href="javascript:showAGB(1);"class="AGBs">Bestellhistory</a>
                <div id="p1">
              		<?php
						while($history = mysql_fetch_array($historyResult)){
							$dataProdukts = explode(";",$history["product"]);
							$dataValue = explode(";",$history["value"]);
					
							echo '<div class="bestellung"><span style="font-weight:bold;">Bestellung vom '. date_format(date_create($history["date"]),"d.m Y").'</span>';
							for($i = 0; $i < count($dataProdukts);$i++){
								echo '<br />'.$dataValue[$i].'x '. $dataProdukts[$i];
							}
							echo '</div>';
						}
					?>
                </div>
                <span id="span1"></span>
            </div>
            <div style="margin-top:20px;">
            	<a href="javascript:showAGB(2);"class="AGBs">Meine Daten</a>
                <div id="p2">
            	<form action="konto.php" method="post">
                <div id="labels">
                    <label for="user">Name:</label><br />
                    <label for="strasse">Stra&szlig;e u. Hausnummer:</label><br />
                    <label for="ort">Ort:</label><br />
                    <label for="plz">Postleitzahl:</label><br />
                    <label for="tele">Handy:</label><br />
                    <label for="email">E-Mail:</label><br />
                </div>
                <div id="errors">
					<?php echo
                        $userError."<br />
                        ".$strasseError."<br />
                        ".$ortError."<br />
                        ".$plzError."<br />
                        ".$teleError."<br />
                        ".$mailError."<br />";
                    ?>
               </div>
                <div id="inputs">
                    <input disabled="disabled" name="user" type="text" <?php echo 'value="'.$row['name'].'"'; ?>/><br />               
                    <input disabled="disabled" name="strasse" type="text" <?php echo 'value="'.$row['strasse'].'"'; ?>/><br  />               
                    <input disabled="disabled" name="ort" type="text" <?php echo 'value="'.$row['ort'].'"'; ?>/><br />
                    <input disabled="disabled" name="plz" type="text" <?php echo 'value="'.$row['plz'].'"'; ?>/><br />
                    <input disabled="disabled" name="tele" type="text" <?php echo 'value="'.$row['tel'].'"'; ?>/><br />
                    <input disabled="disabled" name="email" type="text" <?php echo 'value="'.$row['mail'].'"'; ?>/><br />
                 	<div>
                 		<a href="javascript:unLock();">
                 	 	 	<div id="editPic">Bearbeiten</div>
                		 </a><br  />                    
        		
                    </div>
               </div>
            </form>
            </div>
            <span id="span2"></span>
          </div>
           
        </div>
         <a href="logout.php">
                   	<div id="logout">Logout</div>
            </a>
        </div>
        
        
       
       <div id="foot"></div>
    </div>
</body>
</html>
