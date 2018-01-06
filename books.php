<?php
 header('Access-Control-Allow-Origin: *');
$server = "den1.mysql3.gear.host";
$username = "bluejack";
$pass = "Fv5Hd907?_A4";
$db = "bluejack";

$connection = mysqli_connect($server, $username, $pass, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
if ($_REQUEST) {
$search_query = $_REQUEST['q'];
$query_result = $connection->query("SELECT * FROM bluejack.books WHERE title LIKE '%$search_query%' ");
}else{
	$query_result = $connection->query("SELECT * FROM bluejack.books");
}


$book = [];
$count = 0;
$books = new stdClass();
// looping semua data hasil query
while ($data = $query_result->fetch_assoc()) {
	$book[] = $data;
	$count=$count+1;
}
$books->count = $count;
if ($_REQUEST) {
$books->q = $search_query;
}
$books->book= $book;
header('Content-Type: application/json');
print json_encode($books);
