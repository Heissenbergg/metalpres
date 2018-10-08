var menu = 0;
function pokaziProizvode(){
	var insideElements = todayElements = document.getElementsByClassName('insideParts');
	if(menu == 0){
		for(var i=0;i<insideElements.length; i++){
			insideElements[i].style.display = 'block';
		} menu++;
	}else if(menu == 1){
		for(var i=0;i<insideElements.length; i++){
			insideElements[i].style.display = 'none';
		} menu--;
	}
}

function menuRight(){
	var left = -350;
	var interval = setInterval(function(){
		left+=2;
		document.getElementById("sideMenu").style.left = left + "px";
        if(left == 0) clearInterval(interval);
    }, 1);
}

function menuLeft(){
	console.log("meh");
	var left = 0;
	var interval = setInterval(function(){
		left-=2;
		document.getElementById("sideMenu").style.left = left + "px";
        if(left == -350) clearInterval(interval);
    }, 1);
}

function showSearchArea(){
	document.getElementById("searchArea").style.display = 'block';
}

function hideSearchArea(){
	document.getElementById("searchArea").style.display = 'none';
}