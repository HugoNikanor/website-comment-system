<?php
/*
 * $post which entry the comment should be linked to
 * $author who is the auhtor of the comment | max 100 characters
 * $comment the body of the comment | max 1000 characters
 */
function postCommentToDatabase( $filename, $author, $comment, $parent ) {
	$fullPath = dirname(__FILE__)."/database.ini";
	$values = parse_ini_file( $fullPath );

	$servername = $values["servername"];
	$username   = $values["username"];
	$password   = $values["password"];
	$dbname     = $values["dbname"];
	$table      = $values["table"];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if( $conn->connect_error ) {
		die("Connection failed: " . $conn->connect_error);
	}

	if ((include_once "parsedown/Parsedown.php") == TRUE) {
		$pd = new Parsedown();
		$comment = $pd->text($comment);
	}

	$filename = $conn->real_escape_string($filename);
	$author   = $conn->real_escape_string($author);
	$comment  = $conn->real_escape_string($comment);
	$parent   = $conn->real_escape_string($parent);

	$sql = "insert into ".$table." (entry, author, comment, parent) values ('".$filename."', '".$author."',  '".$comment."',  '".$parent."');";

	if( $conn->query($sql) === TRUE ) {
		//echo "added to database";
	} else {
		//echo "error: ".$sql."<br>".$conn->error;
	}

	$conn->close();
}

// select * from comments where entry like $post // sort by date
/*
function getData( $post ) {
	$fullPath = dirname(__FILE__)."/database.ini";
	$values = parse_ini_file( $fullPath );

	$servername = $values["servername"];
	$username   = $values["username"];
	$password   = $values["password"];
	$dbname     = $values["dbname"];
	$table      = $values["table"];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM ".$table." where entry like '".$post."' ORDER BY time DESC";
	$result = $conn->query($sql);

	$returnList = [];

	if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$returnList[] = $row;
					//echo $row["author"] ."<br>". $row["time"] ."<br>". $row["comment"];
			}
	} else {
			//echo "0 results";
	}
	$conn->close();
	return $returnList;
}
 */

function databaseQuerry( $query ) {
	$fullPath = dirname(__FILE__)."/database.ini";
	$values = parse_ini_file( $fullPath );

	$servername = $values["servername"];
	$username   = $values["username"];
	$password   = $values["password"];
	$dbname     = $values["dbname"];
	$table      = $values["table"];

	$query = sprintf( $query, $table );

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) {
		die("Connect error");
	}

	$result = $conn->query($query);

	$returnList = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$returnList[] = $row;
		}
	}

	$conn->close();
	return $returnList;

}

?>
