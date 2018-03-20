<?php
session_start();

if(!empty($_SESSION['username']) && !empty($_SESSION['password']))
	echo file_get_contents("txt/adminInserisciNews.txt");
else
	echo file_get_contents("txt/loginAdmin.txt");

?>
