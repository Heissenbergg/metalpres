<?php 
require 'class/db.php';
$db = new DB();
$imageQuery = $db->query("photos");
$i = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Keywords" content="stubovi, ograde, kanalice, podesti, stepenici">
        <meta name="Description" content="Proizvodnja pocinčanih ograda, stubova, kanalica, podesta po vašoj mjeri i namjeni">

	    <title>GALERIJA</title>
        <link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
        <link rel="stylesheet" href="css/menu.css" type="text/css" />
        <link rel="stylesheet" href="css/gallery.css" type="text/css" />
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
    </head>
    <body onload="setGallery();">
        <?php require 'includes/menu.php'; ?>
        <div id="galleryWrapper">
            <?php 
            while($img = $imageQuery -> fetch()){ ?>
                <div class="imageDiv">
                    <img 
                        src="admin/images/<?php echo $img['name']; ?>" 
                        id="<?php echo $i++; ?>" 
                        onclick="showHugeiNGallery(this.id);">
                </div>
            <?php }
            ?>
            <?php require 'includes/footer.php'; ?>
        </div>
        <div id="hugeGallery">
            <?php 
            $i = 0;
            $newImageQuery = $db->query("photos");
            while($img = $newImageQuery -> fetch()){ ?>
                <div class="imageDiv" id="someImage<?php echo $i++; ?>">
                    <img src="admin/images/<?php echo $img['name']; ?>">
                </div>
            <?php }
            ?>
            <div class="arrowsForhuge">
                <img onclick="previousInGallery();" src="icon/blackL.png">
            </div>
            <div class="arrowsForhuge arrowsForhugeR">
                <img onclick="nextInGallery();" src="icon/blackR.png">
            </div>
            <img id="exitIcon" onclick="exitGallery();" src="icon/xmark.png">
        </div>

    </body>
</html>