<?php
//requrire("./parsedown/parsedown.php");
function postComment( $filename, $author, $comment ) {
	//$pd = new Parsedown();

	//htmlspecialchars("string");
	//mysql-real-escape-string("string");

	/*
	 * All fields sholud be mysql and html escaped
	 * $comment should possibly then be run through a markdown filter
	 */

	$filename = htmlspecialchars( $filename );
	$author   = htmlspecialchars( $author   );
	$comment  = htmlspecialchars( $comment  );

	postCommentToDatabase( $filename, $author, $comment );


}
?>
