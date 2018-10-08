<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script>
$(document).ready(function(){
  $(".sliderImage").on("swiperight",function(){
    console.log("wee");
  });
});
</script>
<style type="text/css">
  .sliderImage{position: absolute; left: 30px; top: 30px; width: 300px; height: 100px; background: grey;}
</style>
</head>
<body>
<div class="">
  <img class="sliderImage" alt="meh" src="">
</div>

</body>
</html>
