<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "myapp";

$connection = mysqli_connect($server, $username, $pass, $db);


$query_result = $connection->query("SELECT * FROM book");

$books = [];
// looping semua data hasil query
while ($data = $query_result->fetch_assoc()) {
	$books[] = $data;
}

header('Content-Type: application/json');
print json_encode($books);

?>
