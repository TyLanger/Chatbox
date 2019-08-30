<?php

// if txtUsername is unique
// and txtPassword == txtConfirmPassword
// make a new user and add to table


ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = mysqli_connect('localhost', 'test', 'test123', 'chatbox_db');

if(!$link) {
	echo "Debugging error: " . mysqli_error() . '<br />';
}

$query = "SELECT `username` FROM `user` WHERE `username`='{$_POST['txtUsername']}'";
$result = mysqli_query($link, $query);

$validName = false;
$passwordsMatch = false;

if(mysqli_num_rows($result) == 0)
{
	// no rows affected
	// therefore unique username I think
	echo 'Unique username' . '<br />';
	$validName = true;
}
else
{
	echo 'Username already exists' . '<br />';
}


if($_POST['txtPassword'] == $_POST['txtConfirmPassword'])
{
	echo 'Passwords match' . '<br />';
	$passwordsMatch = true;
}
else
{
	echo 'Passwords do not match' . '<br />';
	include "createUser.html";
	// will duplicate the back to login button
}

if($validName && $passwordsMatch)
{
	// create in table
	// if I don't set id, it should auto increment
	$query = "INSERT user (username, password) VALUES ('{$_POST['txtUsername']}', '{$_POST['txtPassword']}')";
	$result = mysqli_query($link, $query);
	
	if($result)
	{
		echo 'Added successfully' . '<br />';
	}
}


// back to login button
echo '<html>';
echo '<body>';
echo '<br />';
echo '<button onclick="location.href=\'login.html\'">Back To Login</button>';
echo '</body>';
echo '</html>';
?>