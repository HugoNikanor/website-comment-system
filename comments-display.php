<?php
require("./database-interface.php");

function displayComments( $entry ) {

	$data = getData( $entry );

?>
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
