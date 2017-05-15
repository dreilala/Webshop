<?php 
$verbindung = new mysqli("localhost", "root", "", "mysql");
#$verbindung = mysql_connect("localhost", "root" , "")
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

$username = ''; 
$password = ''; 
$strasse ='';
$ort = '';
$plz = '';
$tele = '';
$mail = '';
$passwordwdh = '';

if(isset($_POST['user'])){
	$errorOccurred = 0;
	$username = $_POST['user']; 
	$password = $_POST['pass']; 
	$strasse = $_POST['strasse'];
	$ort = $_POST['ort'];
	$plz = $_POST['plz'];
	$tele = $_POST['tele'];
	$mail = $_POST['email'];
	$passwordwdh = $_POST['passwdh']; 
	
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
	if(!preg_match('/.{6,}$/',$password)){
		$passError = "Bitte gültiges Passwort eintragen.";
		$errorOccurred = 1;
	}
	if($passwordwdh != $password){
		$passWdhError = "Bitte das gleiche Passwort eintragen.";
		$errorOccurred = 1;
	}
	if(!$errorOccurred){
	$password = md5($password); 
	
	$result = mysql_query("SELECT id FROM users WHERE mail = '$mail'"); 
	$menge = mysql_num_rows($result); 
	
	if($menge == 0) 
		{ 
		$eintrag = "INSERT INTO users (name,strasse,ort,plz,tel,mail,passwd) VALUES ('$username','$strasse','$ort','$plz','$tele','$mail', '$password')"; 
		$eintragen = mysql_query($eintrag); 
	
		if($eintragen == true) 
			{ 
			header("Location: login.php");
			exit;
			} 
		else{ 
			header("Location: register.php");
			exit;
		} 
	
	
		} 
	
	else 
		{ 
		header("Location: register.php");
		exit;
	}}
}else{
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kopffleischexpress - Tiernahrung &amp; Kauspezialitäten</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleReg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Javascript/script.js"></script>
</head>
<body onload="loaded()">
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
        	<div id="header"></div>
            <div id="randLinks"></div>
             <div id="randRechts"> </div>
        <div id="content">
        	<h2>Registrieren</h2>
            <form action="register.php" method="post">
            	<div id="labels">
            	<label for="user">Name:</label><br />
                <label for="strasse">Stra&szlig;e u. Hausnummer:</label><br />
                <label for="ort">Ort:</label><br />
                <label for="plz">Postleitzahl:</label><br />
                <label for="tele">Handy:</label><br />
                <label for="email">E-Mail:</label><br />
                <label for="pass">Passwort:</label><br />
                <label for="passwdh">Passwort wiederholen:</label><br />
                </div>
                <div id="errors">
               	<?php echo
					$userError."<br />
					".$strasseError."<br />
					".$ortError."<br />
					".$plzError."<br />
					".$teleError."<br />
					".$mailError."<br />
					".$passError."<br />
					".$passWdhError."<br />";
				?>
               </div>
                <div id="inputs">
                    <input name="user" type="text" <?php echo 'value="'.$username.'"'; ?>/><br />               
                    <input name="strasse" type="text" <?php echo 'value="'.$strasse.'"'; ?>/><br  />               
                    <input name="ort" type="text" <?php echo 'value="'.$ort.'"'; ?>/><br />
                    <input name="plz" type="text" <?php echo 'value="'.$plz.'"'; ?>/><br />
                    <input name="tele" type="text" <?php echo 'value="'.$tele.'"'; ?>/><br />
                    <input name="email" type="text" <?php echo 'value="'.$mail.'"'; ?>/><br />
                    <input  title="min. 6 Zeichen" name="pass" type="password" /><br />
                    <input name="passwdh" type="password" /><br />
                    <a href="javascript:document.forms[0].submit();" style="margin-top: 10px;"><div id="register">Registrieren</div></a><br  />
               </div>
               
            </form>
        </div>
        </div>
        
        
       
       <div id="foot"></div>
    </div>
</body>
</html>