function onloadCall(){
	setOurProducts();
	setFooter();
	createDivs();
	hideSlides(1);
	setLineProperty(0);
	autoSlide();
	hideComment(1);
	autoSlideComment();
	loading();
}

function singleOnload(){
	createDivs();
	hideSlides(1);
	setLineProperty(0);
	loading();
}

//loading part

function loading(){
	console.log("done");
	document.getElementById("loadingBar").style.display = 'none';
}

// - currentSlide slika koja je trenutno prikazana 
var currentSlide = 0;
var numberOfSlides = 0;
var dontskip = 0;
//Sakrije sve slike na slideru

function autoSlide(){
	if(dontskip != 0){
		nextOne();
	}
	dontskip++;
	setTimeout(autoSlide, 5000);
}


function createDivs(numberOfImages){
	var wrapper = document.getElementById("sliderPages");
	for(var i=0; i< numberOfImages;i++){
		//Kreiraj wrapper za liniju
		var div = document.createElement("div");
		div.className = "pageSlider";
		//Postavi onlick metodu za prikaz određene slike na osnovu klina na liniju
		div.setAttribute("onclick", 'showSpecificImage('+(i)+')');
		wrapper.appendChild(div);
		//Kreiraj liniju
		var line = document.createElement("div");
		line.className = "sliderPage";
		line.id = ('line' + i);
		div.appendChild(line);
	}
}



function hideSlides(first = null){
	var slides = document.getElementById("slider").getElementsByClassName("sliderImage");
	//Sakrij sve slike od slidera
	numberOfSlides = slides.length - 1;
	for(var i = 0; i < slides.length; i++){
		slides[i].style.display = 'none';
	}	
	if(first){
		//Pokaži samo prvu sliku
		slides[0].style.display = 'block';
		//Kreiraj linije za svaku od slika
		createDivs(slides.length);
	}
}

// pokaže sliku sa id-om na poziv eventa onclick na liniju

function showSpecificImage(id){
	hideSlides();
	setLineProperty(id);
	$("#" + id).fadeIn(200);
}


//Prikaži sljedeći slide

function nextOne(){
	hideSlides();
	if(currentSlide < numberOfSlides){
		currentSlide++;
		$("#" + currentSlide).fadeIn(200);
		setLineProperty(currentSlide);
	}else{
		currentSlide = 0;
		$("#" + currentSlide).fadeIn(200);
		setLineProperty(currentSlide);
	}
}


function previousOne(){
	hideSlides();
	if(currentSlide == 0){
		currentSlide = numberOfSlides;
		$("#" + currentSlide).fadeIn(200);
		setLineProperty(currentSlide);
	}else{
		currentSlide --;
		$("#" + currentSlide).fadeIn(200);
		setLineProperty(currentSlide);
	}
}

//Na osnovu toga na kojem je slidu, mijenja style property svake linije

function setLineProperty(id){
	var line;
	for(var i = 0; i < numberOfSlides + 1; i++){
		line = document.getElementById("line" + i);
		line.style.top = "0px";
		line.style.height = "40px";
		line.style.background = "#fff";
	}
	line = document.getElementById("line" + id);
	line.style.top = "-5px";
	line.style.height = "45px";
	line.style.background = "#ff7709";
	
}

var currentTextSlider = 0;
var numberOfTextSlides;
var dontskipText = 0;
function hideComment(first = null){
	var textSlides = document.getElementById("nestPart2").getElementsByClassName("comment");
	//Sakrij sve slike od slidera
	numberOfTextSlides = textSlides.length -1;
	for(var i = 0; i < textSlides.length; i++){
		textSlides[i].style.display = 'none';
	}	
	if(first){
		//Pokaži samo prvu sliku
		textSlides[0].style.display = 'block';
		//Kreiraj linije za svaku od slika
	}
}

function nextComment(){
	hideComment();
	if(currentTextSlider < numberOfTextSlides){
		currentTextSlider++;
		$("#textSlide" + currentTextSlider).fadeIn(200);
	}else{
		currentTextSlider = 0;
		$("#textSlide" + currentTextSlider).fadeIn(200);
	}
}

function autoSlideComment(){
	if(dontskipText != 0){
		nextComment();
	}
	dontskipText++;
	setTimeout(autoSlideComment, 3000);
}

//Postavlja visinu produkta na širinu u zavisnosti od širine screen-a
//Da bude iste veličine

var margin = 0;
function setOurProducts(){
	var width = window.innerWidth;
	if(width >= 1000){
		var w = window.innerWidth / 4.5;
	}else if(width < 1000 && width >= 500){
		var w = window.innerWidth / 2.5;
	}else if(width < 500){
		var w = window.innerWidth / 1.4;
	}
	var x = document.getElementById("nineofthem").getElementsByClassName("singlePart");
	for(var i=0;i<x.length;i++){
		x[i].style.height = w + 'px';
		margin+=10;
	}
}

//Pomjera footer da bude lijepo pravnano 

function setFooter(){
	var width = window.innerWidth;
	var h = window.innerHeight;
	var sliderHeight = h*0.8 + 80; 
	var nest1 = document.getElementById("nestPart1");
	var nest1H = nest1.clientHeight; 
	var nest2 = document.getElementById("nestPart2");
	var nest2H = nest2.clientHeight;
	var nest3 = document.getElementById("nineofthem");
	var nest3H = nest3.clientHeight;
	var footer = document.getElementById("footer");
	console.log(sliderHeight + nest1H  +nest3H - margin);
	if(width <= 500){
		console.log("top : " + (sliderHeight + nest1H  +nest3H - margin - 90));
		footer.style.top = (sliderHeight + nest1H  +nest3H - margin + 170) + 'px'; 
	}else footer.style.top = (sliderHeight + nest1H + nest2H +nest3H + 160) + 'px'; 
}



/* GALLERYY */
var numOfGalleryImages = 0;
var currentImageInGallery = 0;

function setGallery(){
	var width = window.innerWidth;
	var gallery = document.getElementById("galleryWrapper");
	if(width >= 1200){
		var w = window.innerWidth / 5;
		w = (w / 1.6);
	}else if(width >=800){
		var w = window.innerWidth / 3;
		w = (w / 1.6);
	}else if(width >=500){
		var w = window.innerWidth / 2;
		w = (w / 1.6);
	}else{
		loading();
		return;
	}
	var x = document.getElementById("galleryWrapper").getElementsByClassName("imageDiv");
	for(var i=0;i<x.length;i++){
		x[i].style.height = w + 'px';
		margin+=10;
	}

	loading();
	hideHugeGallery();
}

function showHugeiNGallery(id){
	var width = window.innerWidth;
	if(width < 600) {
		return;
	}
	hideHugeGallery();
	currentImageInGallery = id;
	document.getElementById("someImage" + id).style.display = 'block';
	document.getElementById("hugeGallery").style.display = 'block';
}



function hideHugeGallery(first = null){
	var gallery = document.getElementById("hugeGallery").getElementsByClassName("imageDiv");
	//Sakrij sve slike od slidera
	numOfGalleryImages = gallery.length -1;
	for(var i = 0; i < gallery.length; i++){
		gallery[i].style.display = 'none';
	}
}


function nextInGallery(){
	hideHugeGallery();
	if(currentImageInGallery < numOfGalleryImages){
		currentImageInGallery++;
		$("#someImage" + currentImageInGallery).fadeIn(200);
	}else{
		currentImageInGallery = 0;
		$("#someImage" + currentImageInGallery).fadeIn(200);
	}
}


function previousInGallery(){
	hideHugeGallery();
	if(currentImageInGallery == 0){
		currentImageInGallery = numOfGalleryImages;
		$("#someImage" + currentImageInGallery).fadeIn(200);
	}else{
		currentImageInGallery --;
		$("#someImage" + currentImageInGallery).fadeIn(200);
	}
}


function exitGallery(){
	document.getElementById("hugeGallery").style.display = 'none';
}