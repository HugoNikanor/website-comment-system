<?php
	$filename = htmlspecialchars( $_POST["filename"] );
	$author   = htmlspecialchars( $_POST["author"]   );
	$comment  = htmlspecialchars( $_POST["comment"]  );

	require("./database-interface.php");
	postCommentToDatabase( $filename, $author, $comment );

	header("Location: ./index.php");
	die();
?>
