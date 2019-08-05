<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'khaliddb';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$conn = new mysqli($host, $user, $pass, $db);

