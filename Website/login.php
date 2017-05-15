<?php 
session_start();
?> 

<?php 
$verbindung = new mysqli("localhost", "root", "", "mysql");

#mysql_connect("localhost", "root" , "") 
#or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
#mysql_select_db("mysql", $verbindung) or die ("Datenbank konnte nicht ausgewählt werden");
#mysql_set_charset('utf8'); 
if(isset($_POST['email'])){
	$email = $_POST["email"];
	$password = md5($_POST["password"]); 
	
	$ergebnis = mysql_fetch_array(mysql_query("SELECT passwd FROM users WHERE mail LIKE '".$email."' LIMIT 1")); 
	
	if($ergebnis['passwd'] == $password) 
    { 
		$erg = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE mail ='".$email."'"));
		$_SESSION["id"] = $erg['id'];
		if(isset($_POST['cart'])){
			header("Location: bestellung.php");
			exit;		
		} 	
		header("Location: konto.php"); 
		exit;
	} 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kopffleischexpress - Tiernahrung &amp; Kauspezialitäten</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleLogin.css" rel="stylesheet" type="text/css" />
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
        	<h2>Login</h2>
            <form action="login.php" method="post">
            	<label for="email">E-Mail Adresse:</label>
                <input name="email" type="text" /><br />
                <label for="password">Passwort:</label>
                <input onchange="document.forms[0].submit();" name="password" type="password" /><br  />
                <?php 
					if(isset($_POST['cart'])){
						echo '<input style="display:none;" type="text" name="cart" />'; 	
					}
				?>
                <a href="javascript:document.forms[0].submit();" style="margin-top: 10px;"><div id="login">Login</div></a><br  />
               	<p id="reg">Noch kein Konto?<br /><a href="register.php">Registrieren!</a><p>
            </form>
        </div>
        </div>
        
        
       
       <div id="foot"></div>
    </div>
</body>
</html>
