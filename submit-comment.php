<?php
	$filename  = htmlspecialchars( $_POST["filename"] );
	$author    = htmlspecialchars( $_POST["author"]   );
	$comment   = htmlspecialchars( $_POST["comment"]  );
	$returnAdr = $_POST["returnAdr"];

	echo "something";

	echo $returnAdr;

	require("./database-interface.php");

	echo " else";

	postCommentToDatabase( $filename, $author, $comment );


	echo " is going on here...<br>";

	echo $returnAdr;


	header("Location: ".$returnAdr);
	die();
?>
