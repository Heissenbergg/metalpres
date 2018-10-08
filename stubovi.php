<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <title>STUBOVI</title>
        <link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
        <link rel="stylesheet" href="css/menu.css" type="text/css" />
        <link rel="stylesheet" href="css/products.css" type="text/css" />
        <link rel="stylesheet" href="css/stubovi.css" type="text/css" />
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
    </head>
    <body onload="loading();">
        <?php require 'includes/menu.php'; ?>
        <div id="products">
            <div class="productsHeader">
                <h4>STUBOVI</h4>
            </div>
            <div class="table">
                <div class="tableRow tableRow2">
                    <div class="tableRowHeader">
                        <h4>Dimenzije stubova</h4>
                    </div>
                    <div class="tableRowBody">
                        <p>Stub H = 800</p>
                        <p>Stub H = 1000    </p>
                        <p>Stub H = 1200</p>
                        <p>Stub H = 1300</p>
                        <p>Stub H = 1500</p>
                        <p>Stub H = 1700</p>
                        <p>Stub H = 2000</p>
                    </div>
                </div>
                <div class="tableRow tableRow3">
                    <div class="tableRowHeader">
                        <h4>Nepocinčana (kg/kom)</h4>
                    </div>
                    <div class="tableRowBody">
                        <p>2,72</p>
                        <p>3,14</p>
                        <p>3,88</p>
                        <p>4,17</p>
                        <p>5,55</p>
                        <p>6,23</p>
                        <p>7,25</p>
                    </div>
                </div>
                <div class="tableRow tableRow4">
                    <div class="tableRowHeader">
                        <h4>Pocinčana (kg(kom)</h4>
                    </div>
                    <div class="tableRowBody">
                        <p>2,94</p>
                        <p>3,39</p>
                        <p>4,19</p>
                        <p>4,51</p>
                        <p>5,99</p>
                        <p>6,73</p>
                        <p>7,83</p>
                    </div>
                </div>
            </div>
            </div>
            <?php require_once 'includes/footer.php'; ?>
        </div>
    </body>
</html>