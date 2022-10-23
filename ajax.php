<?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/Moscow');

// $dbh = new PDO("mysql:host=localhost; dbname=u1277887_moomblebe', 'u1277887', 'eWed!!Z8'");
$dbh = new PDO('mysql:dbname=u1277887_moomblebe;host=localhost', 'u1277887', 'eWed!!Z8');
$dbh->exec("set names utf8mb4");

$sql = "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 10";

try {
	$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode( $result );
}
catch(PDOException $e) {
	echo '<pre>'; print_r($sql); echo '</pre>';
	$this->error($e->getMessage());
}

?>