<?php

include_once 'dbConnection.php';

$chatRoomId = $_GET['chatRoomId'];
$messagesCount = $_GET['messagesCount']; 

$sql = "
(SELECT * FROM messages WHERE chat_room_id = $chatRoomId ORDER BY id desc LIMIT $messagesCount) ORDER BY id asc
";

$result = $mysqli->query($sql);

$rows = [];

while ( $row = $result->fetch_assoc() ) { 

	$rows[] = $row;
}

echo json_encode($rows);

?>