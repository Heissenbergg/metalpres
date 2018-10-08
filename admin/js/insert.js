var photos = new Array();

function uploadAllPictures(){
	showloading();
	var fileInput = document.getElementById("file");
	var data = new FormData();
	data.append('file', fileInput.files[0]);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	/*var nameOfImage = this.responseText;*/
	      	var imageName = "images/" + this.responseText; 	  
	      	//Ubaci ime slike u niz photos
	      	photos.push(this.responseText);
	      	//Kreira div-wrapper za sliku i ubacuje ga u div slikeeeeeeeeeee :D
	      	var div = document.createElement("div");
	      	div.className = "slika";
	      	div.id = photos.length - 1;
	      	document.getElementById("allImages").appendChild(div);
	      	//Kreira sliku i ubacuje je u kreirani div
	      	var image = document.createElement("img");
	      	image.setAttribute("src", imageName);
	      	div.appendChild(image);
	      	//Kreiraj delete button
	      	var deleteButton = document.createElement("div");
	      	deleteButton.className = "deletebutton";
	      	deleteButton.setAttribute("onclick", 'deleteImage('+(photos.length - 1)+')');
	      	//deleteButton.onclick = function() { deleteImage(); };
	      	deleteButton.innerHTML = "X";
	      	div.appendChild(deleteButton);
	      	writeAll();
	      	hideloading();
	    }
	};
	xml.open('POST', 'includes/allphoto.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);
}

function writeAll(){
	console.log("Photos : ");
	for(var i=0;i<photos.length;i++) console.log(photos[i]);
}

function deleteImage(id){
	photos.splice(id, 1);
	document.getElementById(id).remove();
	writeAll();
	console.log("Broj slika = " + photos.length);
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}



function savePOST(idofpost = null){
	var header = document.getElementById("header").value;
	var text = document.getElementById("text").value;

	var xhttp = new XMLHttpRequest();
	
	xhttp.open("POST","includes/insert.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("header="+header+"&text="+text+"&photos="+photos);

    xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	window.location = "allposts.php";

	    }
	};
}


function hideloading(){
	document.getElementById("loadingBar").style.display = 'none';
}

function showloading(){
	document.getElementById("loadingBar").style.display = 'block';
}

