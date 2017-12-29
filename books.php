<?php
 header('Access-Control-Allow-Origin: *');
$server = "sql12.freemysqlhosting.net";
$username = "sql12213159";
$pass = "x7jPSZYT2A";
$db = "sql12213159";

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
