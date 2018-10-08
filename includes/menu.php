<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div id="topNav">
	<img onclick="menuRight();" id="menuIcon" src="icon/menu.png">
	<label style="display: none;" onclick="showSearchArea();" for="inputSearchArea">
		<p id="searchText">Pretražite ..</p>
		<img id="searchIcon" src="icon/search.png"></img>
	</label>
	<div id="middleLogo">
		<img src="icon/logo.png">
	</div>
	<img id="loginIcon" src="icon/login.png">
	<p id="loginButton"><a href="login.php">Prijavite se</a></p>
</div>

<div id="searchArea">
	<img onclick="hideSearchArea();" id="exitSearchArea" src="icon/exit.png"></img>
	<form>
		<input type="text" id="inputSearchArea" name="inputSearchArea" placeholder="Pokušajte : spavaće sobe"/>
	</form>
</div>

<div id="sideMenu">
	<img onclick="menuLeft();" id="hideMenu" src="icon/arrowLeft.png">
	<div id="divMenuHeader">
		<p id="menuHeader">MENU</p>
	</div>
	<div id="menuOptions">
		<ul>
			<li role="presentation" class="underline"><p><a title="Dobrodošli na metalpres.ba" href="index.php">NASLOVNA</a></p></li>
			<li role="presentation" class="underline"><p onclick="pokaziProizvode();"><a href="#">PROIZVODI</a></p></li>
			<li role="presentation" class="insideParts"><p><a title="Saznajte više o kanalicama" href="kanalice.php">Kanalice</a></p></li>
			<li role="presentation" class="insideParts"><p><a title="Saznajte više o ogradama" href="ograde.php">Ograde</a></p></li>
			<li role="presentation" class="insideParts"><p><a title="Saznajte više o podestima" href="podesti.php">Podesti</a></p></li>
			<li role="presentation" class="insideParts"><p><a title="Saznajte više o stepenicima" href="stepenici.php">Stepenici</a></p></li>
			<li role="presentation" class="insideParts"><p><a title="Saznajte više o stubovima" href="stubovi.php">Stubovi</a></p></li>
			<li role="presentation" class="underline"><p><a title="Firma Metalpres d.o.o sa dugogodišnjim iskustvom vaše zelje pretvara u stvarnost." href="onama.php">O NAMA</a></p></li>
			<li role="presentation" class="underline"><p><a title="Kontaktirajte nas u bilo koje doba" href="contact.php">KONTAKT</a></p></li>
			<li role="presentation" class="underline"><p><a title="Pogledajte fotografije nekih naših najveličanstvenijih projekata" href="gallery.php">GALERIJA</a></p></li>
		</ul>
	</div>
	<div id="menuFooter">
		<p>Prijavite se za newsletter</p>
		<form>
			<input type="text" placeholder="e-Mail" name="">
			<input id="submitNewsletter" type="submit" value="Prijavite se" name="">
		</form>
	</div>
</div>

<div id="loadingBar">
	<img id="loadingGif" src="icon/loading.gif">
	<img id="loadingLogo" src="icon/logo.png">
</div>