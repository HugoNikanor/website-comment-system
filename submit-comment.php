<?php
	$filename  = htmlspecialchars( $_POST["filename"] );
	$author    = htmlspecialchars( $_POST["author"]   );
	$comment   = htmlspecialchars( $_POST["comment"]  );
	$returnAdr = $_POST["returnAdr"];

	require("./database-interface.php");

	if( !preg_match( "/^\s*$/", $comment ) ) {
		postCommentToDatabase( $filename, $author, $comment );
	}

	header("Location: ".$returnAdr);
	die();
?>
