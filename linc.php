<!DOCTYPE html
<<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/theme.css"/>
	<link rel="stylesheet" type="text/css" href="css/main-content.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
	</script>
</head>
<body class="body">
	
	<header class="mainHeader">
		<img id="Logo" src="http://stemcells.mind.uci.edu/profiles/commerce_kickstart/themes/contrib/omega_kickstart/logo.png">
		<nav>
			<ul>
				<li><a href="/linc/index.html">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>
	</header>


	<div id="MainContent">
		<div id="SearchContainer">
			<?php include "search_box.html";?>
			
			<div id="Misc">
			</div>
		</div>
		<div id="ImageContainer">
		</div>
	</div>


	<div id="DownloadSection">
		<a href="rna_seq.xls" download>Download Data</a>
	</div>
	

	<footer class="mainFooter">
		<a href="//uci.edu/copyright/">
		<small>&copy; 2017 UC Regents</small>
		</a>
	</footer>


	<!-- underscore js allows for a delay on user keyboard input  -->
	<script type="text/javascript" src="js/underscore-min.js"></script>
	<!-- autocomplete js returns the results on input submission -->
	<script type="text/javascript" src="js/autocomplete.js"></script>
	<script type="text/javascript" src="js/outside-events.js"></script>
	<!-- generate-image js handles the execution of R script and generates the image -->
	<script type="text/javascript" src="js/generate-image.js"></script>

</body>
</html>
