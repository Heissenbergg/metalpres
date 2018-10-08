<html>
    <head>
        <meta charset="UTF-8">
	    <title>Kontaktirajte nas</title>
        <link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
        <link rel="stylesheet" href="css/menu.css" type="text/css" />
        <link rel="stylesheet" href="css/contact.css" type="text/css" />
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_bSsQF6xq69Ur1MpcSciTO3jEuWkuskU"></script>
        <script type="text/javascript" src="js/map.js"></script>
	    <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
    </head>
    <body onload="loading();">
        <?php require_once 'includes/menu.php'; ?>
        <div id="map"></div>
        <div id="contactForm">
            <div id="header">
                <p>Kontaktirajte nas</p>
            </div>
            <div id="fomrFrom">
                <input type="text" name="" placeholder="Ime *"/>
                <input type="text" name="" placeholder="Kontakt informacije*"/>
                <input type="text" name="" placeholder="Naslov"/>
                <textarea placeholder="Poruka *"></textarea>
                <input id="sendButton" type="submit" name="" value="Pošaljite"/>
            </div>
        </div>
        <?php require 'includes/footer.php'; ?>
        <!--<div id="centrePart">
            <div id="insideDiv">
                
            </div>
            <img src="icon/arrowDown.png"></img>
        </div>-->
    </body>
</html>