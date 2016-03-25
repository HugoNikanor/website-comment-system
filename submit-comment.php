<?php
	$filename  = htmlspecialchars( $_POST["filename"] );
	$author    = htmlspecialchars( $_POST["author"]   );
	$comment   = htmlspecialchars( $_POST["comment"]  );
	$returnAdr = $_POST["returnAdr"];

	require("./database-interface.php");

	postCommentToDatabase( $filename, $author, $comment );

	header("Location: ".$returnAdr);
	die();
?>
