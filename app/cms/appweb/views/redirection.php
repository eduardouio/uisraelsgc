<html>
<head>
<script type="text/javascript">
function redireccionar(){
  window.location="<?php print base_url(); ?>index.php/home/";
} 
setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
</script>
<style>
.box{
-moz-border-radius: 18px;
-webkit-border-radius: 18px;
border-radius: 18px;
/*IE 7 AND 8 DO NOT SUPPORT BORDER RADIUS*/
-moz-box-shadow: 0px 0px 16px #000000;
-webkit-box-shadow: 0px 0px 16px #000000;
box-shadow: 0px 0px 16px #000000;
/*IE 7 AND 8 DO NOT SUPPORT BLUR PROPERTY OF SHADOWS*/
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#ffffff', endColorstr = '#00aaff');
/*INNER ELEMENTS MUST NOT BREAK THIS ELEMENTS BOUNDARIES*/
/*Element must have a height (not auto)*/
/*All filters must be placed together*/
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr = '#ffffff', endColorstr = '#00aaff')";
/*Element must have a height (not auto)*/
/*All filters must be placed together*/
background-image: -moz-linear-gradient(top, #ffffff, #00aaff);
background-image: -ms-linear-gradient(top, #ffffff, #00aaff);
background-image: -o-linear-gradient(top, #ffffff, #00aaff);
background-image: -webkit-gradient(linear, center top, center bottom, from(#ffffff), to(#00aaff));
background-image: -webkit-linear-gradient(top, #ffffff, #00aaff);
background-image: linear-gradient(top, #ffffff, #00aaff);
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
/*Use "background-clip: padding-box" when using rounded corners to avoid the gradient bleeding through the corners*/
/*--IE9 WILL PLACE THE FILTER ON TOP OF THE ROUNDED CORNERS--*/

padding:25px 50px 75px 100px; 
/*Use "background-clip: padding-box" when using rounded corners to avoid the gradient bleeding through the corners*/
/*--IE9 WILL PLACE THE FILTER ON TOP OF THE ROUNDED CORNERS--*/
}
</style>

</head>
<body>
<div class="box"> Entrando al sistema!... </div>
</body>
</html>