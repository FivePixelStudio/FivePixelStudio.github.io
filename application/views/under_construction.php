<html>
<?php define("BASE_ASSETS", base_url().'assets/') ?>
<head>
<title>Five Pixel Studio</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/img/favicon.ico" type="image/x-icon" />


</head>
<body>
<style>
	body{
		
		background-color: black;
		margin:0px;
		padding:0px;
	
	}
	div.image {
		
		background-image:url("<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/img/underconstruction.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		
		background-position: center center;
		height:100%;
		width:100%;
	
	
	}
</style>

<div class="image"></div>
</body>
</html>