<?php
	$filename  = htmlspecialchars( $_POST["filename"] );
	$author    = htmlspecialchars( $_POST["author"]   );
	$comment   = htmlspecialchars( $_POST["comment"]  );
	$returnAdr = $_POST["returnAdr"];

	require("./database-interface.php");

	// check if the author and comment is not just whitespace
	// also checks that none of the fields are to large
	if( preg_match( "/^\s*$/", $author  ) ||
	    preg_match( "/^\s*$/", $comment ) ||
	    strlen( $author ) > 40            ||
	    strlen( $comment ) > 1500
	) {
		echo file_get_contents("./posting-failed.html");

		echo "<hr>";
		echo "Return to previous <a href=".$returnAdr.">page</a>";
		die();
	} else {
		postCommentToDatabase( $filename, $author, $comment );
	}
	header("Location: ".$returnAdr);
	die();

?>
