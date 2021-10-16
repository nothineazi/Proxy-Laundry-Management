<?php 
require_once('database/connection.php');//start session at default constructor
unset($_SESSION['user_logged']);

header('location: index.php');
