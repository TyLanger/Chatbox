<?php

	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$link = mysqli_connect('localhost', 'test', 'test123', 'chatbox_db');

	if(!$link) {
		echo "Debugging error: " . mysqli_error() . '<br />';
	}

	// check if the room name already exists
	$query = "SELECT name FROM chatroom WHERE name='{$_POST['newRoomName']}'";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) > 1)
	{
		// already exists
		echo 'A ChatBox with that name already exists.';
	}
	else
	{
		// $result is true/false
		//$roomName = $result['name'] . '_message';
		$roomName = $_POST['newRoomName'] . '_message';
		echo $roomName;
		$query = "CREATE TABLE {$roomName} (
		`id` int NOT NULL AUTO_INCREMENT, 
		`author_id` int NOT NULL, 
		`message` text NOT NULL, 
		`dateCreated` datetime, 
		PRIMARY KEY(`id`))";
		
		$result = mysqli_query($link, $query);
		if($result)
		{
			// successfully created new room
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo $row[0];
			}
			echo 'Made new room';
			
			$query = "INSERT chatroom (name) VALUES ('{$roomName}')";
			$result = mysqli_query($link, $query);
			if($result)
			{
				echo 'Room added to list of rooms';
			}
			
		}
		else
		{
			echo 'Query failed';
		}
	}


?>