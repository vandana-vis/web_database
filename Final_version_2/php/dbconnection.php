<?php
$server = "localhost";
$username = "ypenamak";
$password = "Springsemester@2020";
$database = "ypenamak_db";
//$file_location = "/~ypenamak/Project/Attempt1/";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	
}

?>