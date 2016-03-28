<?php
require_once(dirname(__FILE__) . "/database-interface.php");

function displayCommentTree( $entry, $parent ) {
	
	$comments = databaseQuerry(
		"SELECT id, author, time, comment FROM %s
		WHERE parent = ".$parent." AND entry like '".$entry."'
		ORDER BY time DESC;");

	foreach( $comments as $comment ) { ?>
		<div class="comment">
		<div class="comment-info">
			<input class="comment-radio-btn" form="comment-form" type="radio" name="parent" value="<?php echo $comment["id"]; ?>">
			<div class="author"><?php echo $comment["author"]; ?></div>
			<div class="date"><?php echo $comment["time"]; ?></div>
		</div>
		<div class="comment-body"><?php echo $comment["comment"]; ?></div>
		<?php
		//echo '<input form="comment-form" type="radio" name="parent" value="'.$comment["id"].'">';
		displayCommentTree( $entry, $comment["id"] );
		echo "</div>";
	}

}

function displayComments( $entry ) { ?>
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
      action="<?php echo $relPath;?>/submit-comment.php" >
	<input required
	       class="author"
	       type="text"
	       name="author"
	       maxlength=40
	       placeholder="Author" >

	<input class="submit" type="submit" value="Post Comment">

	<input type="radio" name="parent" value="0" checked="checked">

	<textarea rows=3
	          required
	          name="comment"
	          form="comment-form"
	          maxlength=1500
	          placeholder="Write your comment..." ></textarea>

	<input type="hidden" value="<?php echo $entry; ?>" name="filename">
	<input type="hidden" value="<?php echo $returnAdr; ?>" name="returnAdr">
</form>
</div> <!-- comment (submit) -->
</div> <!-- comment-sumbit -->
<?php
	echo "<div id=comment-container>";
	displayCommentTree($entry, 0);
	echo "</div> <!-- comment-container -->";
} ?>


