<!Doctype HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="comments.css">
	<title>comments</title>
</head>
<body>
<div id="comments">
<?php
	error_reporting(E_ALL);
	ini_set('display_errors',1);


	require("./comments-display.php");
	require("./comments.php");

	//$filename = "20160322TestFile.md";
	$filename = "Anotherfilename";

	//postComment( $filename, "Some rad dude", "This is a test comment" );
	//postComment( $filename, "Some commenter", "Atleast better than the YouTube comments..." );

	displayComments( $filename );
	//displayComments( "20160322TestEntry.md" );


?>
</div> <!-- comments -->
</body>
</html>
