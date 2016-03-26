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
<div class="comment">
<?php
	// This is to allow imports to work, hopefully this makes the whole thing portable
	$relPath=".".substr(dirname(__FILE__), strrpos(dirname(__FILE__), "/"));

	$returnAdr = $_SERVER["REQUEST_URI"];
?>
<link rel="stylesheet" href="<?php echo $relPath;?>/comments.css">
<form id="comment-form"
					method="post"
					action=<?php echo $relPath;?>/submit-comment.php >
	<input required
	       class="author"
	       type="text"
	       name="author"
	       maxlength=40
	       placeholder="Author" >

	<input class="submit" type="submit" value="Post Comment">

	<textarea rows=3
	          required
	          name="comment"
	          form="comment-form"
	          maxlength=1500
	          placeholder="Write your comment..." ></textarea>
	<br>

	<input type="hidden" value="<?php echo $entry; ?>" name="filename">
	<input type="hidden" value="<?php echo $returnAdr; ?>" name="returnAdr">
</form>
</div> <!-- comment (submit) -->
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


