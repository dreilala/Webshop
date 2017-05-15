<?php session_start();
include('connectDB.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warenkorb</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleCart.css" rel="stylesheet" type="text/css" />
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
        	<h2>Warenkorb</h2>            
            <?php
				if(isset($_SESSION['cart'])) {
				//show the cart
				//iterate through the cart, the $product_id is the key and $quantity is the value
				$counter = 0;
				$total = 0;
				
				echo "<div style=\"overflow:auto; max-height:350px;\">";
				
				foreach($_SESSION['cart'] as $product_id => $quantity) {	
						
					$sql = sprintf("SELECT * FROM sortiment WHERE id = %d;",
								$product_id); 
					
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
					//Only display the row if there is a product (though there should always be as we have already checked)
					
						if(isset($_SESSION['cart'][$product_id])){
						
						$line_cost = $row["preis"] * $quantity;
						$total = $total + $line_cost;
						
						echo "<div class=\"artikel\">";
							//echo "<img src=\"$image\"/>";
							echo "<div class=\"artikelText\">";
								echo "<div  style='float:right;margin-left:5px;'>";
								echo "<form action='cart_edit.php' method='post'>";
								echo "<input type='hidden' name='id' value='$product_id' />";
								echo "<input type='hidden' name='action' value='remove' />";
								echo "<a href='javascript:document.forms[$counter].submit();'>X</a>";
								echo "</form>";
								echo "</div>";
								$counter++;
								echo "<span style='font-weight:bold'>".$row["name"]."</span></br>";
								echo "<span style='font-size:17px'>".$row["art"]." ".formatGewicht($row["gewicht"])."</br>";
								echo $row["beschreibung"]."</span>";
								echo "<form action='cart_edit.php' method='post'>";
								echo "<input type='hidden' name='id' value='$product_id' />";
								echo "<input type='hidden' name='action' value='set' />";
								echo "<span style='font-size:17px;font-weight:bold'>".number_format($row["preis"],2,",",".")."&euro; x ";
								echo "<input type='text' name='menge' size='1' value='$quantity' onchange='document.forms[$counter].submit();' />";
								echo "= <span style='text-decoration:underline'>".number_format($line_cost,2,",",".")." &euro;</span></span>";
								echo "</form>";
							echo "</div>";
						echo "</div>";
						$counter++;
						}
				}
				
				echo "</div>";
				
				echo "<div>";
					echo "<form action='cart_edit.php' method='post'>";
					echo "<input type='hidden' name='action' value='empty' />";
					echo "<span style='float:right'>Gesamtpreis: ".number_format($total,2,",",".") ."&euro;</span>";
					echo "<a href='javascript:document.forms[$counter].submit();' style='color:#001f0a;'>Warenkorb leeren</a>";
					echo "</form>";
				echo "</div>";
				$counter++;
				if(isset($_SESSION['id'])){
					echo '<form action="bestellung.php" method="post">';					
				}else{
					echo '<form action="login.php" method="post">';
					echo '<input type="text" hidden="true" name="cart" />';
				}
				echo '</form>';
				echo '<a href="javascript:document.forms['.$counter.'].submit()" style="margin-top: 10px;"><div id="btBest">Bestellen</div></a>';
				
				mysql_free_result($result);
				mysql_close();
			}else{
				echo "Sie haben keine Artikel in Ihrem Warenkorb";
			}
			
			function formatGewicht($g){
				if($g>=1000){return number_format($g/1000,1,",",".")."kg";}
				if($g>=100){return "".$g."g";}
				if($g<100){return $g." St&uuml;ck";}
			}
            ?>
        	
        </div>
        </div>
       <div id="foot"></div>
    </div>
        
</body>
</html>