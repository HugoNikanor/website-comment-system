<?php
/*
 * $post which entry the comment should be linked to
 * $author who is the auhtor of the comment | max 100 characters
 * $comment the body of the comment | max 1000 characters
 */
function postCommentToDatabase( $filename, $author, $comment ) {
	$fullPath = dirname(__FILE__)."/database.ini";
	$values = parse_ini_file( $fullPath );

	$servername = $values["servername"];
	$username   = $values["username"];
	$password   = $values["password"];
	$dbname     = $values["dbname"];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if( $conn->connect_error ) {
		die("Connection failed: " . $conn->connect_error);
	}

	$filename = $conn->real_escape_string($filename);
	$author   = $conn->real_escape_string($author);
	$comment  = $conn->real_escape_string($comment);
	$sql = "insert into comments (entry, author, comment) values ('".$filename."', '".$author."',  '".$comment."')";

	if( $conn->query($sql) === TRUE ) {
		//echo "added to database";
	} else {
		//echo "error: ".$sql."<br>".$conn->error;
	}

	$conn->close();
}

// select * from comments where entry like $post // sort by date
function getData( $post ) {
	$fullPath = dirname(__FILE__)."/database.ini";
	$values = parse_ini_file( $fullPath );

	$servername = $values["servername"];
	$username   = $values["username"];
	$password   = $values["password"];
	$dbname     = $values["dbname"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM comments where entry like '".$post."'";
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
?>
