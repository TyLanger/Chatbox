<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = mysqli_connect('localhost', 'test', 'test123', 'chatbox_db');

if(!$link) {
	echo "Debugging error: " . mysqli_error() . '<br />';
}

$query = "SELECT `username`, `id` FROM `user` WHERE `password`='{$_POST['txtPassword']}' AND `username`='{$_POST['txtUsername']}'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result) == 1)
{
	// found 1 match
	// therefore, password and username match
	echo 'matching password and username.<br />';
	$_SESSION['user_id'] = mysqli_fetch_array($result)['id'];
	// redirect to welcom page
	include "chatboxSelection.html";
}
else
{
	echo 'wrong username or password.<br />';
}

//echo $_POST['txtUsername'] . ' successfully logged in.';


// back to login button
echo '<html>';
echo '<body>';
echo '<br />';
echo '<button onclick="location.href=\'login.html\'">Back To Login</button>';
echo '</body>';
echo '</html>';

?>