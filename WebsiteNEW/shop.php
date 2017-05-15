<?php 
include('connectDB.php');

$kate = $_POST["kategorie"];
if(isset($_POST["searchText"])){
$result=mysql_query("SELECT * FROM sortiment WHERE kategorie="."'".$kate."'"." AND LOWER(name) LIKE LOWER('%".$_POST["searchText"]."%') OR kategorie="."'".$kate."'"." AND LOWER(art) LIKE LOWER('%".$_POST["searchText"]."%')");
}else{
$result=mysql_query("SELECT * FROM sortiment WHERE kategorie="."'".$kate."'");
}
//weitermachen
//items adden
$items = array();
$i = 1;

while($row=mysql_fetch_array($result)){
		if(!in_array($row['name'],array_values($items))){
			$items[$i]["id"] = $row['id'];
			$items[$i]["name"]= $row['name'];
			$items[$i]["art"]= $row['art'];
			$items[$i]["gewicht"]= array();
			$items[$i]["gewicht"][]=$row['gewicht'];
			$items[$i]["preis"]= array();
			$items[$i]["preis"][]=$row['preis'];
		}else{
			for($x = 0;count($items);$x++){
				if($items[$i]["name"]==$items[$x]["name"]){
					$items[$x]["gewicht"][]= $row['gewicht'];
					$items[$x]["preis"][]= $row['preis'];
					break;
				}
			}
		}
		
		$i++;
}
mysql_free_result($result);
mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kopffleischexpress - Tiernahrung &amp; Kauspezialitäten</title>
<link rel="shortcut icon" href="Pictures/LogoIcon.ico"/>
<link href="Stylesheets/styleShopTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Javascript/jquery.js"></script>
<script type="text/javascript" src="Javascript/jquery.tablesorter.js"></script>
<script type="text/javascript" src="Javascript/script.js"></script>

</head>
<body onload="loaded()">

    <div id="overall">
	<div id="left">	
    <div id="logo"></div>
           <div id="naviAll">
             <a href="home.html" style="margin-left:18px;"><div class="navi"><b>Home</b></div></a>
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
        <div style="float:right;margin-right:55px;width:263px;">
        		<div id="cartsearch">
        			<div style="float:left;border-right:#001f0a 1px groove;padding-right:5px;"><a href="cart.php" style="font-size:25px;text-decoration:none;color:#001f0a;">Warenkorb</a></div>
        			<div>
        				<span style="font-size:25px;padding-left:5px;" onmouseover="showSearchField();" onmouseout="setFalse();">Suchen</span>
            		</div>
        		</div>
                <div style="float:right;margin-right:55px;">
            	 <form action="shop.php" method="post" >
        		<?php echo '<input type="text" hidden="true" name="kategorie" value="'.$kate.'" />';?>
            	<input style="display:none;" name="searchText" align="right" onkeypress="setTrue();" onchange="document.forms[0].submit();" on onmouseover="setTrue();" onmouseout="setFalse();" type="text" />
        	</form></div>
            </div>
        
       	  <h2 style="font-size:34px;">Shop</h2>
          
          		<img id="added" style="display:none;position:absolute;top:120px;left:200px;" src="Pictures/Gruener-Haken.png" width="75px"/>
           	<?php if(count($items)>0){
            echo "<div id='artikelTable'>";
        	echo "<table id='artikel' class='tablesorter'>";
				echo "<thead>";
				echo "<tr>";
                    echo "<th>Artikel</th>";
                    echo "<th>Art</th>";
                    echo "<th>Gewicht</th>";
                    echo "<th>Preis</th>";
                    echo "<th>Menge</th>";
                    echo "<th></th>";
                echo "</tr>";
				echo "</thead>";
				echo "<tbody>";

				for($i = 1; $i < count($items)+1;$i++){
					echo "<form name='form$i' action='details.php' method='post'>";
					echo '<input type="hidden" name="id" value="'.$items[$i]["id"].'" />';
					echo "<tr>";
					echo "<td><a onclick='document.forms[$i].submit();'>" . $items[$i]['name'] . "</td>";
					echo "<td>" . $items[$i]['art'] . "</td>";
					if(count($items[$i]['gewicht'])>1){
						echo "<td><select>";
						for($x = 0; $x < count($items[$i]['gewicht']);$x++){
							echo '<option onclick="changeWeight($i,$x)">' . formatGewicht($items[$i]['gewicht'][$x]) . "</option>";
						}
						echo "</select></td>";
						echo "<td>" . '<input type="text" name="preis" value="".number_format($items[$i]["preis"][0],2,",",".")." &euro;"/>' ."</td>";
					}else{
						if($items[$i]["id"]==76){echo "<td>100 St&uuml;ck</td>";}
						else{echo "<td>" . formatGewicht($items[$i]['gewicht'][0]) . "</td>";}
						echo "<td>" . number_format($items[$i]['preis'][0],2,",",".") . " &euro;</td>";
					}
					echo "<td>" . '<input type="text" name="menge" size="2" value="1"/>' . "</td>";
					echo "<td>" .  "<a onclick='post($i);'><img src='Pictures/cart_add.png' width='30px' /></a>" . "</td>";
					echo "</tr>";
					echo "</form>";
				}
				echo "</tbody>";
                echo "</table>";
                echo "</div>";
				}else{
					echo "<span style='font-size:23px;font-style:italic;'>Keine Artikel gefunden</span>";	
					
				}
				
				function formatGewicht($g){
				if($g>=1000){return number_format($g/1000,1,",",".")."kg";}
				if($g>=100){return "".$g."g";}
				if($g<100){return $g." St&uuml;ck";}
				}
				?>
            </div>
      </div> 
</body>
</html>