<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$link = mysqli_connect('localhost', 'test', 'test123', 'chatbox_db');

	if(!$link) {
		echo "Debugging error: " . mysqli_error() . '<br />';
	}


	$roomTable = $_POST['chatBoxTable'];
	$message = $_POST['message'];
	$authorId = $_POST['authorId'];
	$dateCreated = date("Y-m-d H:i:s");
	
	//echo $roomTable . '<br />';
	//echo $message. '<br />';
	//echo $authorId. '<br />';
	
	$query = "INSERT `$roomTable` (`author_id`, `message`, `dateCreated`) VALUES ($authorId, '$message', '$dateCreated')";
	$result = mysqli_query($link, $query);
	if($result)
	{
		// inserted message properly
		//echo 'message sent';
		
	}

?>