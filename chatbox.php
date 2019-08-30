<?php

session_start();
echo $_SESSION['user_id'] . '<br />';

ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = mysqli_connect('localhost', 'test', 'test123', 'chatbox_db');

if(!$link) {
	echo "Debugging error: " . mysqli_error() . '<br />';
}

$room = $_POST['cmbChatbox'];

// return name and message
// message comes from the message chatbox
// name is where id == authod_id
$query = "SELECT u.username, r.author_id, r.message FROM `user` AS u INNER JOIN `{$room}` AS r ON u.id = r.author_id ORDER BY `dateCreated` ASC";
$result = mysqli_query($link, $query);

// display all the messages to this point
while($row = mysqli_fetch_array($result))
{
	echo "{$row['username']}: {$row['message']}" . '<br />';
}

// below is a form for inputting a message
?>

<html>
<body>

<form name="sendMessage" method="post" action="sendMessage.php" target="_blank">
<input type="hidden" name="chatBoxTable" value=<?php echo "$room"; ?> />
<!-- author_id is based on who is logged in 
$_SESSION['id'] might help-->
<input type="hidden" name="authorId" value=<?php echo $_SESSION['user_id']; ?> />

<input type="text" name="message" />
<input type="submit" name="btnSubmit" value="Submit" />
</form>

</body>
</html>