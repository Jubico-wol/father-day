<?php
$host = "cervezatona.cedzwrni6pi1.us-west-2.rds.amazonaws.com";
$db = "tona"; // Change your database name
$username = "admin";          // Your database user id 
$password = "c3rv3za!";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];