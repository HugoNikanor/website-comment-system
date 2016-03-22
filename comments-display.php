<?php
require("./database-interface.php");

function displayComments( $entry ) {

	$data = getData( $entry );

?>
<div id="comment-submit">
<form id="comment-form">
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
</form>
</div>
<div id="comment-container">
<?php

	foreach( $data as $value ) {
	if( true ): ?>
<div class="comment">
<div class="comment-info">
	<div class="author"><?php echo $value["author"]; ?></div>
	<div class="date"><?php echo $value["time"]; ?></div>
</div>
<div class="comment-body"><?php echo $value["comment"]; ?></div>
</div>
<?php endif; } ?>
</div> <!-- comment-container -->
<?php } ?>
