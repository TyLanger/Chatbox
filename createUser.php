<?php

// if txtUsername is unique
// and txtPassword == txtConfirmPassword
// make a new user and add to table

/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = mysqli_connect('localhost', 'test', 'test123', 'chatBox_db');

if(!$link) {
	echo "Debugging error: " . mysqli_error() . '<br />';
}

$query = "SELECT `username` FROM `user` WHERE `username`='{$_POST['txtUsername']}'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result) == 0)
{
	// no rows affected
	// therefore unique username I think
}
*/

if($_POST['txtPassword'] == $_POST['txtConfirmPassword'])
{
	echo 'Passwords match' . '<br />';
}
else
{
	echo 'Passwords do not match' . '<br />';
	include "createUser.html";
	// will duplicate the back to login button
}


// back to login button
echo '<html>';
echo '<body>';
echo '<br />';
echo '<button onclick="location.href=\'login.html\'">Back To Login</button>';
echo '</body>';
echo '</html>';
?>