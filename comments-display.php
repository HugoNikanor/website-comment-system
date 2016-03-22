<?php
require_once(dirname(__FILE__) . "/database-interface.php");

function displaySingleComment( $author, $time, $comment ) {
	if( true ): ?>
<div class="comment">
<div class="comment-info">
	<div class="author"><?php echo $author; ?></div>
	<div class="date"><?php echo $time; ?></div>
</div>
<div class="comment-body"><?php echo $comment; ?></div>
</div>
<?php
		endif;
}	

function displayComments( $entry ) {

	$data = getData( $entry );

?>
<div id="comment-submit">
<link rel="stylesheet" href="./comments.css">
<form 
	id="comment-form" 
	method="post" 
	action=<?php echo dirname(__FILE__). "/submit-comment.php"; ?>
>
	Comment:<br>
	<textarea 
		rows=7 
		required 
		name="comment" 
		form="comment-form" 
		maxlength=1000 
		placeholder="Write your comment..."
	></textarea><br>

	Author:<br>
	<input 
		required 
		class="author" 
		type="text" 
		name="author"
		placeholder="Author"
	>
	<input class="submit" type="submit" value="Post Comment">

	<input type="hidden" value="<?php echo $entry; ?>" name="filename">
</form>
</div> <!-- comment-sumbit -->
<div id="comment-container">
<?php 
	if( empty($data) ) {
		displaySingleComment(
			"System", "",  "There are no comments yet, Be the first to comment!");
	}
	foreach( $data as $value ) {
		displaySingleComment( 
			$value["author"], $value["time"], $value["comment"] );
	}
echo "</div> <!-- comment-container -->";
} ?>

