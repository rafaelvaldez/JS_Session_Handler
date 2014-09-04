<?php

// Inialize session
$login = $_GET['login'];
session_start();
if($login){
	$_SESSION['loggedIn'] = uniqid();	
	header('Location: app.php');	
}else{
	session_destroy();
	header('Location: index.php');
}