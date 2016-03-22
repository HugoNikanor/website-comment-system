<!Doctype HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>comments</title>
</head>
<body>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors',1);


	require("./comments-display.php");

	//$filename = "20160322TestFile.md";
	$filename = "Anotherfilename";

	displayComments( $filename );
?>
</body>
</html>
