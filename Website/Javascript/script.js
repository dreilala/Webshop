
function loaded(){
	rand();	
}

$(document).ready(function() 
    { 
        $("#artikel").tablesorter(); 
    } 
); 


function loadAGBs(){
	hideAll();
	rand();
}

function rand(){	
	var temp = document.getElementsByClassName("rand");
	document.getElementById("randLinks").style.height = document.getElementById("content").offsetHeight + "px"; 
	document.getElementById("randRechts").style.height = document.getElementById("content").offsetHeight + "px"; 
}
	
function showAGB(x){
	if(document.getElementById("p"+x).style.display=="none"){
		hideAll();
		document.getElementById("p"+x).style.display = "block";
		document.getElementById("span"+x).style.display = "none";
	}else{
		document.getElementById("p"+x).style.display = "none";
		document.getElementById("span"+x).style.display = "block";
	}	
	rand();
}

function hideAll(){
	for(var t = 1; t <= document.getElementsByClassName("AGBs").length;t++){
		document.getElementById("p"+t).style.display = "none";
		document.getElementById("span"+t).style.display = "block";
	}
}
function unLock(){
	var enable;
	if(document.getElementsByTagName("input")[0].disabled){
		enable = false;
		document.getElementById("editPic").innerHTML = "Speichern";
	}else{	
		document.forms[0].submit();
	}
	for(var x = 0; x < document.getElementsByTagName("input").length; x++){
		document.getElementsByTagName("input")[x].disabled = enable;
	}
}

var bool = false;

function hide(){
	if(!bool){
		window.document.forms[0].searchText.style.display = "none";
	}		
}
function showSearchField(){
	window.document.forms[0].searchText.style.display = "block";
	bool = true;
}
function setFalse(){
	bool = false;
	setTimeout('hide()', 500);
}
function setTrue(){
	bool = true;	
}

function post(formular){
	var id = document.forms[formular].id.value;
	var menge = document.forms[formular].menge.value;
	if(menge > 0){
	$.post('cart_edit.php',{action: "add", id: id, menge: menge});
	artikelAbhaken();
	}
	document.forms[formular].menge.value = "1";
}

function artikelAbhaken(){
	document.getElementById('added').style.left=document.getElementById('artikel').offsetLeft + document.getElementById('artikel').offsetWidth/2-75/2 + "px";
	document.getElementById('added').style.top=document.getElementById('artikelTable').offsetTop + document.getElementById('artikelTable').offsetHeight/2-75/2 + "px";
	$('#added').fadeIn('fast');
	$('#added').fadeOut('slow');
}